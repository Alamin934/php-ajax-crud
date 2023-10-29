<?php
include "config.php";

$limit_per_page = 5;
// $page = "";
if(isset($_POST['page_no'])){
    $page = $_POST['page_no'];
}else{
    $page = 0;
}

// $offset = ($page-1)*$limit_per_page;

$sql = "SELECT * FROM students LIMIT {$page},{$limit_per_page}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

$output="";
if(mysqli_num_rows($result)>0){
        $output .= '<tbody>';
        while($row = mysqli_fetch_assoc($result)){
            $last_id = $row['id'];
            $output.= '<tr align="center">
                            <td>'.$row["id"].'</td>
                            <td align="left">'.$row["first_name"].' '. $row["last_name"].'</td>
                            <td>
                                <button class="update-btn" data-eid="'.$row["id"].'">Update</button>
                                <button class="del-btn" data-id="'.$row["id"].'">Delete</button>
                            </td>
                       </tr>';
        }

    $output.= '</tbody>
            <tbody>
                <tr id="pagination">
                    <td colspan="3" align="center">
                        <button id="load-more-btn" data-id="'.$last_id.'">Load More</button>
                    </td>
                </tr>
            </tbody>';

    // $page_sql = "SELECT * FROM students";
    // $page_result = mysqli_query($conn, $page_sql) or die("SQL Query Failed.");
    // $total_data = mysqli_num_rows($page_result);
    // $total_pages = ceil($total_data/$limit_per_page);

    // $output.= '<div id="pagination">';
    //         for($i=1; $i<=$total_pages; $i++){
    //             if($i == $page){
    //                 $active = 'active';
    //             }else{
    //                 $active = '';
    //             }
    //             $output.= '<a id="'.$i.'" href="" class="'.$active.'">'.$i.'</a>';
    //         }
    // $output.= '</div>';

echo $output;
    mysqli_close($conn);
}
