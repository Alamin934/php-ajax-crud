<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Ajax</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="main" border="0" cellspacing="0"  align="center">
        <tr>
            <td align="">
                <h1>PHP Ajax</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 0px">Search:<input type="search" id="search"></td>
        </tr>
        <tr>
            <td id="table-form" align="center">
                <form id="form">
                    First Name: <input type="text" id="fname">
                    Last Name: <input type="text" id="lname">
                    <input type="button" value="Save Data" id="save-btn">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data">
                <table id="load-data" border="1" width="100%" cellspacing="0" cellpadding="10px">
                    <tr align="center">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Update/Delete</th>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
    <div id="error-msg"></div>
    <div id="success-msg"></div>

    <div id="modal">
        <div id="modal-form">
            <h2>Edit Data</h2>
            <table border="0" cellspacing="5px"  align="center" width="100%">
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" id="edit_fname"></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" id="edit_lname"></td>
                </tr>
                <tr>
                    <td>
                        <input type="button" value="Update Data" id="edit-data">
                    </td>
                </tr>
            </table>
            <div id="close-btn">X</div>
        </div>
    </div>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/custom.js" type="text/javascript"></script>
</body>
</html>