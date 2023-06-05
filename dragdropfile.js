$(window).ready(function() {
	let elements = document.getElementsByClassName("filename"),
		elements_array = Array.from(elements);
	
	$(".filename").prop('title', rcmail.gettext('drag_all_files', 'dragdropfile'));
	elements_array.forEach(item => item.addEventListener("dragstart", my_on_drop_link, false));	// Обработчик события для каждого файла вложения
}); 


// обработка перетаскивания файла в ссылке
function my_on_drop_link(event) {
	const file = event.currentTarget.children[0].textContent, 
		url = this.href;
		
	event.dataTransfer.setData('DownloadURL', `:${file}:${url}`);
}