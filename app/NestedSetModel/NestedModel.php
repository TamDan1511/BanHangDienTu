<?php
namespace App\NestedSetModel;
use Illuminate\Support\Facades\DB;
use App\Repositories\CategoryRepository;
class NestedModel
{
    private $table;
    public $data;
    public $parent_id;
    private $id;

    public function setTable($table)
    {
        $this->table = $table;
    }
 
    public function removeNode($id, $option = 'branch')
    {
        $this->id = $id;
        if ($option == 'branch') return $this->removeBranch();
        if ($option == 'one') return $this->removeOne();
    }

    public function removeBranch()
    {
        $nodeRemoveInfo = $this->getNodeInfo($this->id);


        $width = $this->widthNode($nodeRemoveInfo->left, $nodeRemoveInfo->right);

        $affected = DB::table($this->table)->whereBetween('left', [$nodeRemoveInfo->left, $nodeRemoveInfo->right])->delete();
        DB::table($this->table)->where('left', '>', $nodeRemoveInfo->right)->decrement('left', $width);

        DB::table($this->table)->where('right', '>', $nodeRemoveInfo->right)->decrement('right', $width);

        ///===========cập nhật first last nơi di chuyển đi==================
        $countBrother = DB::table($this->table)->where('parent_id', $nodeRemoveInfo->parent_id)->count();

        if($countBrother == 1)
        {
            DB::table($this->table)->where('parent_id', $nodeRemoveInfo->parent_id)->update(['first' => 1, 'last'=> 1]);
        }else{
            $firstNode =  DB::table($this->table)->where('parent_id', $nodeRemoveInfo->parent_id)
                            ->orderBy('left')->first();
            
            if(!empty($firstNode)) 
                DB::table($this->table)->where('id', $firstNode->id)
                ->update(['first' => 1, 'last' => 0]);

                
            $lastNode =  DB::table($this->table)->where('parent_id', $nodeRemoveInfo->parent_id)
                                                ->orderByDesc('right')->first();
            if(!empty($lastNode))
            DB::table($this->table)->where('id', $lastNode->id)
                ->update(['first' => 0, 'last' => 1]);
            
        }
       return $affected;
    }

    public function removeOne()
    {
        $nodeMoveInfo = $this->getNodeInfo($this->id);
        $records = DB::table($this->table)->where('parent_id', $this->id)->get();

        $childs = array();
        foreach($records as $value){
            $childs[] = $value->id;
        }
       
        if (count($childs) > 0) {
            foreach ($childs as $value) {
                $option['position'] = 'before';
                $option['brother_id'] = $nodeMoveInfo['id'];

                $this->moveNode($value, $nodeMoveInfo['parent_id'],  $option);
            }
        }

        return $this->removeNode($nodeMoveInfo['id']);
    }

    public function updateNode($id, $data, $newParentId = 0)
    {
        if ($newParentId != 0) {
            $option['position'] = 'left';
            $this->moveNode($id, $newParentId, $option);
        }

        if($this->table == 'categories')
        {
            $categoryRepository = new CategoryRepository();
            return $categoryRepository->update($data, $id);
        }
    }

    public function insertNode($data, $parent = 1, $option = null)
    {
        $this->data = $data;
        $this->parent_id = $parent;

        if ($option['position'] == 'right' || $option == null) {
            return $this->insertRight();
        } else if ($option['position'] == 'left') {
            return $this->insertLeft();
        } else if ($option['position'] == 'before') {
            return$this->insertBefore($option['brother_id']);
        } else {
            return $this->insertAfter($option['brother_id']);
        }
    }

    public function insertRight()
    {
        $parentInfo = $this->getNodeInfo($this->parent_id);
        $parentRight = $parentInfo->right;

         
        DB::table($this->table)->where('left', '>', $parentRight)->increment('left', 2);
        
        DB::table($this->table)->where('right', '>=', $parentRight)->increment('right', 2);

        $data = $this->data;
        $data['left'] =  $parentRight;
        $data['right'] = $parentRight + 1;
        $data['level'] = $parentInfo->level + 1;

        $model = null;
        if($this->table == 'categories')
        {
            $categoryRepository = new CategoryRepository();
            $model = $categoryRepository->store($data);
        }     


        return response()->json($model); 
    }

     

    public function insertLeft()
    {
        $parentInfo = $this->getNodeInfo($this->parent_id);
        
        $parentLeft = $parentInfo->left;

        $newLeft = $parentLeft + 1;
        DB::table($this->table)->where('left', '>=', $newLeft)->increment('left', 2);
 
        DB::table($this->table)->where('right', '>=', $newLeft)->increment('right', 2);

        $brother = DB::table($this->table)->whereBetween('left', [$parentInfo->left + 1, $parentInfo->right])->count();
        DB::table($this->table)->whereBetween('left', [$parentInfo->left + 1, $parentInfo->right])
                                ->where('parent_id', $this->parent_id)->update(['first' => 0]);

        $data = $this->data;
        $data['left'] =  $parentLeft + 1;
        $data['right'] = $parentLeft + 2;
        $data['level'] = $parentInfo->level + 1;

        if($brother == 0){
            $data['first']  = 1;
            $data['last']   = 1;
        }else{
            $data['first']  = 1;
            $data['last']   = 0;
        }

        $model = null;
        if($this->table == 'categories')
        {
            
            $categoryRepository = new CategoryRepository();
            $model = $categoryRepository->store($data);
        }     


        return response()->json(['category' =>$model]); 
         
    }

    public function insertBefore($brother_id)
    {
        $brotherInfo = $this->getNodeInfo($brother_id);
        $brotherLeft = $brotherInfo->left;

        DB::table($this->table)->where('left', '>=', $brotherLeft)->increment('left', 2);

        DB::table($this->table)->where('right', '>', $brotherLeft)->increment('right', 2);

        $data = $this->data;
        $data['parent_id'] = $brotherInfo['parent_id'];
        $data['left'] =  $brotherLeft;
        $data['right'] = $brotherLeft + 1;
        $data['level'] = $brotherInfo['level'];

        DB::table($this->table)->insert($data);
    }

    public function insertAfter($brother_id)
    {
         
        $brotherInfo = $this->getNodeInfo($brother_id);
        $brotherRight = $brotherInfo->right;

        DB::table($this->table)->where('left', '>', $brotherRight)->increment('left', 2);
        DB::table($this->table)->where('right', '>', $brotherRight)->increment('right', 2);

        $data = $this->data;
        $data['parent_id'] = $brotherInfo['parent_id'];
        $data['left'] =  $brotherRight + 1;
        $data['right'] = $brotherRight + 2;
        $data['level'] = $brotherInfo['level'];

        DB::table($this->table)->insert($data);
    }

    public function getNodeInfo($id)
    {
        $row = DB::table($this->table)->where('id', $id)->first();
        return $row;

    }

    public function moveNode($id, $parent_id, $option = null)
    {
        $this->id = $id;
        $this->parent_id = $parent_id;

        if ($option['position'] == 'right' || $option == null) {
            $this->moveRight();
        } else if ($option['position'] == 'left') {
            $this->moveLeft();
        } else if ($option['position'] == 'before') {
            $this->moveBefore($option['brother_id']);
        } else if ($option['position'] == 'after') {
            $this->moveAfter($option['brother_id']);
        }
    }

    private function moveRight()
    {
        /**
         * ======================= lấy thông tin node cần di chuyển===================================
         */
        $nodeMoveInfo = $this->getNodeInfo($this->id);
        /**
         * ======================= 1 tách nhánh ra khỏi cây(tách left và right)===================================
         */
    
        DB::table($this->table)
            ->whereBetween('left', [$nodeMoveInfo->left, $nodeMoveInfo->right])
            ->update(['left' => `left` - $nodeMoveInfo->left, 'right' => `right` - $nodeMoveInfo->right]);
        /**
         * ======================= 2 tính độ dài khoảng giá trị của node cần di chuyển===================================
         */
        
         $widthNodeMove = $this->widthNode($nodeMoveInfo->left, $nodeMoveInfo->right);
    

        /**
         * ======================= 3 cập nhật lại các nhánh bên phải của node cần di chuyển===================================
         */
       
        DB::table($this->table)->where('left', '>', $nodeMoveInfo->right)->decrement('left', $widthNodeMove);

        DB::table($this->table)->where('right', '>', $nodeMoveInfo->right)->decrement('right', $widthNodeMove);

        /**
         * ======================= 4 lấy thông tin node cha===================================
         */

        $parentInfo = $this->getNodeInfo($this->parent_id);

        /**
         * ======================= 5 cập nhật lại các nhánh bên phải node được gắn vào===================================
         */

        DB::table($this->table)->where('left', '>', $parentInfo->left)->increment('left', $widthNodeMove);

        DB::table($this->table)->where('right', '>', $parentInfo->left)->increment('right', $widthNodeMove);



        /**
         * ======================= 6 update level cho node di chuyển===================================
         */
 
        DB::table($this->table)->where('right', '<=', 0)->decrement('level', $nodeMoveInfo->level + 1 + $parentInfo->level);
        /**
         * ======================= 7 cập nhật lại các nhánh của node di chuyển===================================
         */
        
        DB::table($this->table)->where('right', '<=', 0)->increment('left', $parentInfo->right);

        $rightNode = $parentInfo->right + $widthNodeMove - 1;
         
        DB::table($this->table)->where('right', '<=', 0)->increment('right', $rightNode);

        /**
         * ======================= 8 cập nhật parent_id chop node di chuyển===================================
         */

        
        DB::table($this->table)->where('id', $this->id)->update(['parent_id' => $this->parent_id]);
    }

    private function widthNode($leftMoveNode, $rightMoveNode)
    {
        return $rightMoveNode - $leftMoveNode + 1;
    }

    private function moveLeft()
    {
        $nodeMoveInfo = $this->getNodeInfo($this->id);
        /**
         * ======================= 1 tách nhánh ra khỏi cây(tách left và right)===================================
         */

        DB::table($this->table)
        ->whereBetween('left', [$nodeMoveInfo->left, $nodeMoveInfo->right])
        ->decrement('right', $nodeMoveInfo->right);

        DB::table($this->table)
            ->whereBetween('left', [$nodeMoveInfo->left, $nodeMoveInfo->right])
            ->decrement('left', $nodeMoveInfo->left);
        /**
         * ======================= 2 tính độ dài khoảng giá trị của node cần di chuyển===================================
         */
   
        $widthNodeMove = $this->widthNode($nodeMoveInfo->left, $nodeMoveInfo->right);
  

        /**
         * ======================= 3 cập nhật lại các nhánh bên phải của node cần di chuyển===================================
         */

        DB::table($this->table)->where('left', '>', $nodeMoveInfo->right)->decrement('left', $widthNodeMove);

        DB::table($this->table)->where('right', '>', $nodeMoveInfo->right)->decrement('right', $widthNodeMove);

        /**
         * ======================= 4 lấy thông tin node cha===================================
         */

        $parentInfo = $this->getNodeInfo($this->parent_id);
        /**
         * ======================= 5 cập nhật lại các nhánh bên phải node được gắn vào===================================
         */
       
        DB::table($this->table)->where('left', '>', $parentInfo->left)
                                ->where('right', '>', 0)->increment('left', $widthNodeMove);

        DB::table($this->table)->where('right', '>', $parentInfo->left)
                                ->where('right', '>', 0)->increment('right', $widthNodeMove);

        /**
         * ======================= 6 update level cho node di chuyển===================================
         */

        DB::table($this->table)->where('right', '<=', 0)->decrement('level', $nodeMoveInfo->level);
        DB::table($this->table)->where('right', '<=', 0)->increment('level', $parentInfo->level + 1);

        /**
         * ======================= 7 cập nhật lại các nhánh của node di chuyển===================================
         */
        DB::table($this->table)->where('right', '<=', 0)->increment('left', $parentInfo->left + 1);

        $leftNode = $parentInfo->left + $widthNodeMove;
         
        DB::table($this->table)->where('right', '<=', 0)->increment('right', $leftNode);

        /**
         * ======================= 8 cập nhật parent_id chop node di chuyển===================================
         */
        DB::table($this->table)->where('id', $this->id)->update(['parent_id' => $this->parent_id]);

        // =================cập nhật first last nơi di chuyển đến ===================
        $brother = DB::table($this->table)->where('parent_id', $this->parent_id)->count();
        DB::table($this->table)->where('parent_id', $this->parent_id)->update(['first' => 0]);
        if($brother == 1)
        {
            DB::table($this->table)->where('id', $this->id)->update(['first' => 1, 'last'=> 1]);
        }else{
            DB::table($this->table)->where('id', $this->id)->update(['first' => 1, 'last'=> 0]);
        }
        ///===========cập nhật first last nơi di chuyển đi==================
        $countBrother = DB::table($this->table)->where('parent_id', $nodeMoveInfo->parent_id)->count();

        if($countBrother == 1)
        {
            DB::table($this->table)->where('parent_id', $nodeMoveInfo->parent_id)->update(['first' => 1, 'last'=> 1]);
        }else{
            $firstNode =  DB::table($this->table)->where('parent_id', $nodeMoveInfo->parent_id)
                            ->orderBy('left')->first();
            
            if(!empty($firstNode)) 
                DB::table($this->table)->where('id', $firstNode->id)
                ->update(['first' => 1, 'last' => 0]);

                
            $lastNode =  DB::table($this->table)->where('parent_id', $nodeMoveInfo->parent_id)
                                                ->orderByDesc('right')->first();
            if(!empty($lastNode))
            DB::table($this->table)->where('id', $lastNode->id)
                ->update(['first' => 0, 'last' => 1]);
            
        }
    }

    private function moveBefore($brother_id)
    {
        $nodeMoveInfo = $this->getNodeInfo($this->id);

        /**
         * ======================= 1 tách nhánh ra khỏi cây(tách left và right)===================================
         */

        DB::table($this->table)
        ->whereBetween('left', [$nodeMoveInfo->left, $nodeMoveInfo->right])
        ->decrement('right', $nodeMoveInfo->right);

        DB::table($this->table)
            ->whereBetween('left', [$nodeMoveInfo->left, $nodeMoveInfo->right])
            ->decrement('left', $nodeMoveInfo->left);  
         

        /**
         * ======================= 2 tính độ dài khoảng giá trị của node cần di chuyển===================================
         */
        $widthNodeMove = $this->widthNode($nodeMoveInfo->left, $nodeMoveInfo->right);
    
        /**
         * ======================= 3 cập nhật lại các nhánh bên phải của node cần di chuyển===================================
         */
        DB::table($this->table)->where('left', '>', $nodeMoveInfo->right)->decrement('left', $widthNodeMove);

        DB::table($this->table)->where('right', '>', $nodeMoveInfo->right)->decrement('right', $widthNodeMove);

        /**
         * ======================= 4 lấy thông tin node cha===================================
         */

        $parentInfo = $this->getNodeInfo($this->parent_id);

        $brotherNodeInfo = $this->getNodeInfo($brother_id);

        // /**
        //  * ======================= 5 cập nhật lại các nhánh bên phải node được gắn vào===================================
        //  */

        DB::table($this->table)->where('left', '>=', $brotherNodeInfo->left)
                                ->where('right', '>', 0)->increment('left', $widthNodeMove);

        DB::table($this->table)->where('right', '>', $brotherNodeInfo->left)
                                ->where('right', '>', 0)->increment('right', $widthNodeMove);

        /**
         * ======================= 6 update level cho node di chuyển===================================
         */
        DB::table($this->table)->where('right', '<=', 0)->decrement('level', $nodeMoveInfo->level);
        DB::table($this->table)->where('right', '<=', 0)->increment('level', $parentInfo->level + 1);

        /**
         * ======================= 7 cập nhật lại các nhánh của node di chuyển===================================
         */

        DB::table($this->table)->where('right', '<=', 0)->increment('left', $brotherNodeInfo->left);

        $leftNode = $brotherNodeInfo->left + $widthNodeMove - 1;
         
        DB::table($this->table)->where('right', '<=', 0)->increment('right', $leftNode);

        /**
         * ======================= 8 cập nhật parent_id chop node di chuyển===================================
         */

        DB::table($this->table)->where('id', $this->id)->update(['parent_id' => $this->parent_id]);
    }

    private function moveAfter($brother_id)
    {
        $nodeMoveInfo = $this->getNodeInfo($this->id);

        /**
         * ======================= 1 tách nhánh ra khỏi cây(tách left và right)===================================
         */

        DB::table($this->table)
        ->whereBetween('left', [$nodeMoveInfo->left, $nodeMoveInfo->right])
        ->decrement('right', $nodeMoveInfo->right);

        DB::table($this->table)
            ->whereBetween('left', [$nodeMoveInfo->left, $nodeMoveInfo->right])
            ->decrement('left', $nodeMoveInfo->left);  

        /**
         * ======================= 2 tính độ dài khoảng giá trị của node cần di chuyển===================================
         */
        
        $widthNodeMove = $this->widthNode($nodeMoveInfo->left, $nodeMoveInfo->right);
        

        /**
         * ======================= 3 cập nhật lại các nhánh bên phải của node cần di chuyển===================================
         */
        DB::table($this->table)->where('left', '>', $nodeMoveInfo->right)->decrement('left', $widthNodeMove);

        DB::table($this->table)->where('right', '>', $nodeMoveInfo->right)->decrement('right', $widthNodeMove);

        /**
         * ======================= 4 lấy thông tin node cha===================================
         */

        $parentInfo = $this->getNodeInfo($this->parent_id);
        /**
         * ======================= lấy thông tin node anh em ===================================
         */
        $brotherNodeInfo = $this->getNodeInfo($brother_id);

        /**
         * ======================= 5 cập nhật lại các nhánh bên phải node được gắn vào===================================
         */
        DB::table($this->table)->where('left', '>', $brotherNodeInfo->right)
                                ->where('right', '>', 0)->increment('left', $widthNodeMove);

        DB::table($this->table)->where('right', '>', $brotherNodeInfo->right)
                                ->where('right', '>', 0)->increment('right', $widthNodeMove);

        /**
         * ======================= 6 update level cho node di chuyển===================================
         */
        
        DB::table($this->table)->where('right', '<=', 0)->decrement('level', $nodeMoveInfo->level);
        DB::table($this->table)->where('right', '<=', 0)->increment('level', $parentInfo->level + 1);


        /**
         * ======================= 7 cập nhật lại các nhánh của node di chuyển===================================
         */
 
        DB::table($this->table)->where('right', '<=', 0)->increment('left', $brotherNodeInfo->right + 1);

        $leftNode = $brotherNodeInfo->right + $widthNodeMove;
         
        DB::table($this->table)->where('right', '<=', 0)->increment('right', $leftNode);

        /**
         * ======================= 8 cập nhật parent_id chop node di chuyển===================================
         */

        DB::table($this->table)->where('id', $this->id)->update(['parent_id' => $this->parent_id]);


    }

    public function moveUp($id)
    {
        $nodeMoveInfo = $this->getNodeInfo($id);


        $brotherNode = DB::table($this->table)->where('parent_id', $nodeMoveInfo->parent_id)
                                ->where('left', '<', $nodeMoveInfo->left)
                                ->orderByDesc('left')
                                ->limit(1)
                                ->first();
                               
        if (!empty($brotherNode)) {
            $option['position'] = 'before';
            $option['brother_id'] = $brotherNode->id;
            $this->moveNode($id, $nodeMoveInfo->parent_id, $option);

            if($nodeMoveInfo->last == 1)
            {
                DB::table($this->table)->where('id', $id)->update(['last'=> 0]);
                DB::table($this->table)->where('id', $brotherNode->id)->update(['last'=> 1]);
            }

            if($brotherNode->first == 1)
            {
                DB::table($this->table)->where('id', $id)->update(['first'=> 1]);
                DB::table($this->table)->where('id', $brotherNode->id)->update(['first'=> 0]);
            }
        }
    }

    public function moveDown($id)
    {
        $nodeMoveInfo = $this->getNodeInfo($id);


        $brotherNode = DB::table($this->table)->where('parent_id', $nodeMoveInfo->parent_id)
                                ->where('left', '>', $nodeMoveInfo->right)
                                ->orderBy('left')
                                ->limit(1)
                                ->first();
                             
        if (!empty($brotherNode)) {

            $option['position'] = 'after';

            $option['brother_id'] = $brotherNode->id;
            $this->moveNode($id, $nodeMoveInfo->parent_id, $option);

            if (!empty($brotherNode)) {
                $option['position'] = 'after';
                $option['brother_id'] = $brotherNode->id;
                $this->moveNode($id, $nodeMoveInfo->parent_id, $option);
    
                if($nodeMoveInfo->first == 1)
                {
                    DB::table($this->table)->where('id', $id)->update(['first'=> 0]);
                    DB::table($this->table)->where('id', $brotherNode->id)->update(['first'=> 1]);
                }
    
                if($brotherNode->last == 1)
                {
                    DB::table($this->table)->where('id', $id)->update(['last'=> 1]);
                    DB::table($this->table)->where('id', $brotherNode->id)->update(['last'=> 0]);
                }
            }
        }
    }
}
