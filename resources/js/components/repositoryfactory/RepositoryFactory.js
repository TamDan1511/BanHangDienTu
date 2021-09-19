import UserRepository from '../repositories/UserRepository.js';
import CategoryRepository from '../repositories/CategoryRepository.js';
import BlogRepository from "../repositories/BlogRepository.js";
const repositories = {
	user		: UserRepository,
	category	: CategoryRepository,
    blog        : BlogRepository
}

export default{
	get: name => repositories[name]
}
