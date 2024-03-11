function search() {
	const query = document.getElementById('searchInput').value;
	const elements = document.querySelectorAll('body *');
  
	elements.forEach((element) => {
	  if (element.textContent.includes(query)) {
		element.style.color = 'green';
	  }
	});
}