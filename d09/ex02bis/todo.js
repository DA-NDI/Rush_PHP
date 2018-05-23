$(document).ready(function(){
var plan = document.cookie.split(";");
var i = 0;

while (i < plan.length)
{
    tmp = plan[i].split('=');
    if (tmp[1] != null)
    $('#ft_list').prepend($('<div>' + tmp[1]+ '</div>').click(remove));
    i++;
}
});

function remove(){
 if (confirm("Are you sure?")){
   $(this).remove();
   document.cookie = this.innerHTML + "=";
}
}

$("#submit").click(function new_item(){
 var plan = prompt("Please add new plan");
 if (plan != null){
   $('#ft_list').prepend($('<div>' + plan + '</div>').click(remove));
   document.cookie = plan + "=" + plan;
 }
});