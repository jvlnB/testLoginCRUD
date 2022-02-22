$(document).ready(function()
{
    insert(); //call the insert function
   //display(); //call function that is assigned to view the data
})

//Insert Data to the Database

function insert()
{
    //give function after 'insert' btn was clicked
    $(document).on('click', '#insert', function()
    {
    //call all the input variables (id)
    var uname = $('#un').val(); //username input is set to 'uname' variable
    var pass = $('#pwd').val(); //password input is set to 'pass' variable
    var mail = $('#email').val(); //email input is set to 'mail' variable
    var regEx = /^[^ ]+@[^ ]+.[a-z]{2,3}$/;

        //validate email
    if (regEx.text(mail)){
        alert("Valid Email");
    //check for empty input
    if (uname == "" || pass == "" || mail=="" )
    {
        $('#msg').html(
        Swal.fire({
            title: 'Warning!',
            text: 'All inputs are required!',
            icon: 'warning',
            confirmButtonText: 'OK'
          })
          );
    } else
{
    //AJAX
        $.ajax({
            type: 'POST',
            url: '../insert.php', //page where the insert function is
            data: {username:uname, password:pass, email:mail}, //first variable (username) is the var that you will use in php insert file to get the (uname) data
            success: function (response) { 
                $('#msg').html(response); //output or result based on the query on php file
                $('form').trigger('reset'); //clear input
            }
        });
    }
} else {
   alert("Invalid Email");
}
    })
}

//diplaying table and data
// function display()
// {
//     $.$.ajax({
//         type: "post",
//         url: "index.php",
//         success: function (response) {
//             response = $.parseJSON(response);
//             if(response.status=='success')
//             {
//                 console.log(response);
//             }
//         }
//     });
// }