$(document).ready(function(){

    // Ajax Data Load/Show
    function loadData(page){
        $.ajax({
            url : "ajax-load.php",
            type : "POST",
            data: {page_no: page},
            success : function(data){
                // $("#table-data").html(data);
                if(data){
                    $("#pagination").remove();
                    $("#load-data").append(data);
                }else{
                    $("#load-more-btn").html("Finished");
                    $("#load-more-btn").prop("disabled", true);
                }
            }
        });
    }
    loadData();

    // Ajax Pagination
    $(document).on("click", "#load-more-btn", function(){
        $("#load-more-btn").html("Loading....");
        var page_id = $(this).data("id");
        loadData(page_id);
    })

    // Ajax Data Insert/Save
    $("#save-btn").on("click", function(e){
        e.preventDefault();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        if(fname == "" || lname == ""){
            $("#error-msg").html("All fileds are required").slideDown();
            $("#success-msg").slideUp();
        }else{
            $.ajax({
                url : "ajax-insert.php",
                type : "POST",
                data: {first_name: fname, last_name: lname},
                success : function(data){
                    if(data==1){
                        loadData();
                        $("#form").trigger("reset");
                        $("#success-msg").html("Data Inserted Successfully.").slideDown();
                        $("#error-msg").slideUp();
                    }else{
                        $("#error-msg").html("Can't Save Data.").slideDown();
                        $("#success-msg").slideUp();
                    }
                }
            });
        } 
    });

    // Ajax Data Delete/Remove
    $(document).on("click", ".del-btn", function(){

        if(confirm("Do you really want to delete tihs record?")){
            var std_id = $(this).data("id");
            var element = this;
            $.ajax({
                url: "ajax-delete.php",
                type: "POST",
                data: {id: std_id},
                success: function(data){
                    if(data == 1){
                        $(element).closest("tr").fadeOut();
                    }else{
                        $("#error-msg").html("Can't Delete Data.").slideDown();
                        $("#success-msg").slideUp();
                    }
                }
            });
        }
    });

    // Show Modal Box
    $(document).on("click", ".update-btn", function(){
        $("#modal").fadeIn();
        
        var estd_id = $(this).data("eid");
        
        $.ajax({
            url: "load-update-form.php",
            type: "POST",
            data: {id : estd_id},
            success: function(data){
                $("#modal table").html(data);
            }
        });
    });
    
    // Hide Modal
    $("#close-btn").on("click", function(){
        $("#modal").fadeOut();
    })
    
    // Ajax Data Update/Edit
    $(document).on("click", "#edit-data", function(){
        var e_id = $("#edit-id").val();
        var e_fname = $("#edit_fname").val();
        var e_lname = $("#edit_lname").val();

        $.ajax({
            url: "update-ajax-data.php",
            type: "POST",
            data: {std_id: e_id, first_name: e_fname, last_name: e_lname},
            success: function(data){
                if(data == 1){
                    $("#modal").fadeOut();
                    loadData();
                    $("#success-msg").html("Data Updated Successfully.").slideDown();
                    $("#error-msg").slideUp();
                }else{
                    $("#modal").fadeOut();
                    $("#error-msg").html("Can't Update Data.").slideDown();
                    $("#success-msg").slideUp();
                }
            }
        });
    });


    // Live Ajax Search
    $("#search").on("keyup", function(){
        var search_term = $(this).val();

        $.ajax({
            url: "ajax-live-search.php",
            type: "POST",
            data: {search: search_term},
            success: function(data){
                $("#table-data").html(data);
            }
        });
    });
    
});