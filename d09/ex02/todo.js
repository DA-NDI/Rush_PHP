var index = 1;
		function put_cookie()
		{
			var arr = document.cookie;
			console.log(arr);
			arr = arr.split(";");
			put_list(arr);
		}
		function put_list(arr){
			for(el in arr)
			{
				var ft_list = document.getElementById('ft_list');
				var spl = arr[el].split("=");
				if (spl[1] != null) {
					var new_elem = document.createElement('div');
					new_elem.setAttribute('style', 'background: red');
					new_elem.setAttribute('id', index);
					var_text = document.createTextNode(spl[1]);
					new_elem.appendChild(var_text);
					ft_list.insertBefore(new_elem, ft_list.firstChild);
					new_elem.setAttribute('onclick', 'Remove_list(id);');
					index++;
				}
			}
		}
		function set_cookie(list, index) {
			document.cookie = index + "=" + list;
			console.log(document.cookie);
		} 
		
		function Remove_list(ind){
			var ft_list = document.getElementById('ft_list');
			console.log(ind);
			var child = document.getElementById(ind);
			if (window.confirm ("Are you sure to remove?"))
			{
				ft_list.removeChild(child);
				document.cookie = ind + "=";
			}
		}
		function Add_list(){

			var ft_list = document.getElementById('ft_list');
			var list = prompt("Please enter new TO DO task");
			if (list != null) {
				var new_elem = document.createElement('div');
				new_elem.setAttribute('style', 'background: LightSeaGreen');
				new_elem.setAttribute('id', index);
				var_text = document.createTextNode(list);
				new_elem.appendChild(var_text);
				ft_list.insertBefore(new_elem, ft_list.firstChild);
				new_elem.setAttribute('onclick', 'Remove_list(id);');
				set_cookie(list, index);
				index++;
			}
			
		}