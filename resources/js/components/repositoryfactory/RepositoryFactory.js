import UserRepository from '../repositories/UserRepository.js';
import CategoryRepository from '../repositories/CategoryRepository.js';
import ProductRepository from '../repositories/ProductRepository.js';
const repositories = {
	user		: UserRepository,
	category	: CategoryRepository,
	product		: ProductRepository
}

export default{
	get: name => repositories[name]
}