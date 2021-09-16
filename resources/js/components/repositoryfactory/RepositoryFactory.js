import UserRepository from '../repositories/UserRepository.js';
import CategoryRepository from '../repositories/CategoryRepository.js';
import ProductRepository from '../repositories/ProductRepository.js';
import MenuRepository from '../repositories/MenuRepository.js';
import BannerRepository from '../repositories/BannerRepository.js';
const repositories = {
	user		: UserRepository,
	category	: CategoryRepository,
	product		: ProductRepository,
	menu		: MenuRepository,
	banner		: BannerRepository
}

export default{
	get: name => repositories[name]
}