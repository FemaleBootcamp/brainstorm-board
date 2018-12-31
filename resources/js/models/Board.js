class Board{

	static all(then){
		
		return axios.get('/boards')
			.then(({data}) => then(data));

	}

}

export default Board;