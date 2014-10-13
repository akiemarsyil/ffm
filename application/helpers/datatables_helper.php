<?php 
/*
 * function that generate the action buttons edit, delete
 * This is just showing the idea you can use it in different view or whatever fits your needs
 */
// function get_detail_edit_delete($id)
// {
//     $ci =& get_instance();

//     $html = '
//     <div class="btn-group">
//         <a href="detail/'.$id.'" data-toggle="tooltip" title="Detail" class="btn btn-xs btn-default"><i class="icon-search"></i></a>
//         <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i></a>
//         <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-default"><i class="icon-remove"></i></a>
//         <a href="print/'.$id.'" data-toggle="tooltip" title="Print" class="btn btn-xs btn-default"><i class="icon-print"></i></a>
//     </div>
//     ';
    
//     return $html;
// }

function get_detail_edit_delete($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="detail/'.$id.'" data-toggle="tooltip" title="Detail" class="btn btn-xs btn-default"><i class="icon-search"></i></a>
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i></a>
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-default"><i class="icon-remove"></i></a>
        
    </div>
    ';
    
    return $html;
}

function get_edit_delete_ajax($id)
{
    // master (kategori,department,subkategori)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actEdit('.$id.')" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i></a>
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-default"><i class="icon-remove"></i></a>
    </div>
    ';
    
    return $html;
}

function get_delete_ajax($id)
{
    // master (setup area, setup product)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actDelete('.$id.')" data-toggle="tooltip" title="Hapus Setup" class="btn btn-xs btn-default"><i class="icon-remove"></i></a>
    </div>
    ';
    
    return $html;
}

function get_edit_ajax($id)
{
    // master (setup area, setup product)
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a onclick="actEdit('.$id.')" data-toggle="tooltip" title="Edit Setup" class="btn btn-xs btn-default"><i class="icon-pencil"></i> Edit Max</a>
    </div>
    ';
    
    return $html;
}

function get_edit($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i></a>
    </div>
    ';
    
    return $html;
}

function get_detail_edit_print($id)
{
    $ci =& get_instance();
    // $key = paramEncrypt($id);

    $html = '
    <div class="btn-group">
        <a href="edit/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i></a>
        <a href="print_faktur/'.$id.'" target="_blank" data-toggle="tooltip" title="Print" class="btn btn-xs btn-default"><i class="icon-print"></i> Print</a>
    </div>  
    ';
    
    return $html;
}
function get_detail_blended($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i> edit</a>
        <a onclick="actUnblend('.$id.')" data-toggle="tooltip" title="unblended" class="btn btn-xs btn-default"><i class="icon-remove"></i> unblended</a>
    </div>
    ';
    
    return $html;
}
function get_detail_edit_delete_ajax($id)
{
    $ci =& get_instance();

    $html = '
    <div class="btn-group">
        <a href="tambah/'.$id.'" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="icon-pencil"></i> edit</a>
        <a onclick="actDel('.$id.')" data-toggle="tooltip" title="delete" class="btn btn-xs btn-default"><i class="icon-remove"> delete</i></a>
    </div>
    ';
    
    return $html;
}