import UserRepository from '../repositories/UserRepository.js';
import CategoryRepository from '../repositories/CategoryRepository.js';
const repositories = {
	user		: UserRepository,
	category	: CategoryRepository
}

export default{
	get: name => repositories[name]
}