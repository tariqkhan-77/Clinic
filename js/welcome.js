
//login button (codes for Modal)
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var lnk = document.getElementById("add_btn");

// Get the <span> element that closes the modal
//var span = document.getElementsByClassName("close")[0];
    var btn = document.getElementById("cancel");

// When the user clicks the button, open the modal 
lnk.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on cancel button, close the modal
btn.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
//window.onclick = function(event) {
// if (event.target == modal) {
//  modal.style.display = "none";
// }
//}

// Reset button

   function resetForm(myFormId)
   {
       var myForm = document.getElementById(myFormId);

       for (var i = 0; i < myForm.elements.length; i++)
       {
           if ('submit' != myForm.elements[i].type && 'reset' != myForm.elements[i].type)
           {
               myForm.elements[i].checked = false;
               myForm.elements[i].value = '';
               myForm.elements[i].selectedIndex = 0;
           }
       }
   }

   // delete modal
// Get the modal
$(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '/delete.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });
