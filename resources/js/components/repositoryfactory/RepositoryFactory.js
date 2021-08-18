import UserRepository from '../repositories/UserRepository.js';

const repositories = {
	user: UserRepository,
}

export default{
	get: name => repositories[name]
}