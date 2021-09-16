import Repository from './Repository.js';

const resource = '/api/admin/product';
export default {
    find(id) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };

        return Repository.get(`${resource}/${id}`, config)
            .then(response => {
                return response.data.product
            });
    },
    getSubPicture(id) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };

        return Repository.get(`/api/admin/getSubPicture/${id}`, config)
            .then(response => {
                return response.data
            });
    },
    getAll(page) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.get(`${resource}?page=${page}`, config)
            .then(response => {
                return response.data;
            })
    },

    changeActive(updateStatus) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/changeActive`, updateStatus, config)
            .then(response => {
                return response.data.update;

            });
    },

    store(product, type, appThis) {
        let token = window.localStorage.getItem('token');
        let formData = new FormData();
        formData.append('picture', product.picture);
        formData.append('name', product.name);
        formData.append('price', product.price);
        formData.append('quantities', product.quantities);
        formData.append('discount', product.discount);
        formData.append('status', product.status);
        formData.append('time_discount', product.time_discount);
        formData.append('description', product.description);
        formData.append('options', product.options);
        formData.append('category_id', product.category_id);
        for (let i = 0; i < product.sub_image.length; i++) {
            formData.append('sub_image[]', product.sub_image[i].file);
        }


        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}`, formData, config)
            .then(response => {
                console.log(response.data)
                if (type == 'save')
                    appThis.$router.push({ name: 'ProductEdit', query: { 'sanpham': response.data.product.id }, params: { isActive: true, type: 'add' } });
                else if (type == 'save-add')
                    return { status: 200 };
                else
                    appThis.$router.push({ name: 'ProductItem', params: { isActive: true, type: 'add' } });

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },
    update(product, type, appThis) {
        let token = window.localStorage.getItem('token');
        let formData = new FormData();

        formData.append('picture', product.picture);
        formData.append('name', product.name);
        formData.append('_method', product._method);
        formData.append('price', product.price);
        formData.append('quantities', product.quantities);
        formData.append('discount', product.discount);
        formData.append('status', product.status);
        formData.append('time_discount', product.time_discount);
        formData.append('description', product.description);
        formData.append('options', product.options);
        formData.append('category_id', product.category_id);
        for (let i = 0; i < product.sub_image.length; i++) {
            formData.append('sub_image[]', product.sub_image[i].file);
        }
        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/${product.id}`, formData, config)
            .then(response => {
                if (type == 'save')
                    return { status: 200, affected: response.data.affected };
                else if (type == 'save-add')
                    appThis.$router.push({ name: 'ProductStore', params: { isActive: true } });
                else
                    appThis.$router.push({ name: 'ProductItem', params: { isActive: true, type: 'edit' } });

            })
            .catch(error => {
                return { status: 422, errors: error.response.data.errors };
            })
    },

    deleteItem(id) {
        let token = window.localStorage.getItem('token');

        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.delete(`${resource}/${id}`, config)
            .then(response => {
                return response.data;

            })
            .catch(error => {
              console.log(error.response.data );
            })
    },

    updateCategory(product_id, category_id){
        let token = window.localStorage.getItem('token');
        let updateCategory = {product_id: product_id, category_id: category_id};
        let config = { headers: { "Authorization": `Bearer ${token}` } };
        return Repository.post(`${resource}/updateCategory`, updateCategory, config)
            .then(response => {
                return response.data.update;
            });
    }
}
