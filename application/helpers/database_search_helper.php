<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('grep_db')) {
    function grep_db($db_name, $search_values){
        $table_fields = array();
        $cumulative_results = array();
        $ci =& get_instance();
        $result = $ci->db->query("
            SELECT TABLE_NAME, COLUMN_NAME, DATA_TYPE
            FROM  `INFORMATION_SCHEMA`.`COLUMNS` 
            WHERE  `TABLE_SCHEMA` =  '{$db_name}'
            -- AND `DATA_TYPE` IN ('varchar', 'char', 'id')
            ")->result_array();    
        foreach ( $result  as $o ) 
        {
            $table_fields[$o['TABLE_NAME']][] = $o['COLUMN_NAME'];          
        }
        foreach($table_fields as $table_name => $fields)
        {
            $search_array = array();
            foreach($fields as $field)
            {
                foreach($search_values as $value) 
                {
                    $search_array[] = " `{$field}` LIKE '{$value}' ";
                }
            }
            $search_string = implode (' OR ', $search_array);
            $query_string = "SELECT `{$table_name}`.* , '{$table_name}' AS tablename FROM `{$table_name}` WHERE {$search_string} ORDER BY {$search_string} ASC";
            $table_results =  $ci->db->query($query_string)->result_object();
            $cumulative_results = array_merge($cumulative_results, $table_results);
        }
        return  $cumulative_results;
    }
}

if (!function_exists('loadItemsSettings')) {
    function loadItemsSettings($item = null) {
        if(!is_null($item->tablename)){
            $ci =& get_instance();
            switch ($item->tablename) {
                // case 'e_users':
                //     $ci->load->model('Register_users_model');
                //     break;
                case 'e_terminals':
                    $ci->load->model('Terminal_model');
                    break;
                case 'e_shop':
                    $ci->load->model('Shop_model');
                    break;
                case 'e_restaurants':
                    $table_model = 'Restaurant_model';
                    echo "<div class='col-xs-6 col-sm-3'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>".loadTableName('e_restaurants')."</div>
                                <div class='panel-body'>
                                <div class='input-group mb-2 mr-sm-2 mb-sm-0 form-group'>
                                    <div class='input-group-addon'>
                                        <span class='glyphicon glyphicon-align-left'></span>
                                    </div>
                                <input type='text' name='e_address' class='form-control ' value= '$item->e_name'  disabled>
                                </div>

                                <div class='input-group mb-2 mr-sm-2 mb-sm-0 form-group'>
                                    <div class='input-group-addon'>
                                        <i class='glyphicon glyphicon-phone-alt'></i>
                                    </div>
                                <input type='text' name='e_address' class='form-control ' value= '$item->e_pnumber'  disabled>
                                </div>

                                <div class='input-group mb-2 mr-sm-2 mb-sm-0 form-group'>
                                    <div class='input-group-addon'>
                                        <span class='glyphicon glyphicon-map-marker'></span>
                                    </div>
                                    <input type='text' name='e_address' class='form-control ' value= '$item->e_address'  disabled>
                                </div>
                                    <button type='button' class='btn btn-danger btn-block' onclick='  deleteConfRest($item->id)'>
                                         Հեռացնել 
                                    </button>
                                    <button type='button' class='btn btn-success btn-block' onclick='changeItemRest($item->id)'>
                                        Փոփոխել 
                                    </button>
                            </div>
                        </div>
                    </div>";
                    loadJS(array(
                        'deleteItems' => 'deleteItems'
                        ),base_url()
                    );
                    break;
                case 'e_rent_home':
                    $ci->load->model('Rent_home_model');
                    break;
                case 'e_pharmacy':
                    $ci->load->model('Pharmacy_model');
                    break;
                case 'e_hotels':
                    $table_model = 'Hotels_model';
                    echo "<div class='col-xs-6 col-sm-3'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>".loadTableName('e_hotels')."</div>
                                <div class='panel-body'>
                                <div class='input-group mb-2 mr-sm-2 mb-sm-0 form-group'>
                                    <div class='input-group-addon'>
                                        <span class='glyphicon glyphicon-align-left'></span>
                                    </div>
                                <input type='text' name='e_address' class='form-control ' value= '$item->e_hotel_name'  disabled>
                                </div>

                                <div class='input-group mb-2 mr-sm-2 mb-sm-0 form-group'>
                                    <div class='input-group-addon'>
                                        <i class='glyphicon glyphicon-phone-alt'></i>
                                    </div>
                                <input type='text' name='e_address' class='form-control ' value= '$item->e_pnumber'  disabled>
                                </div>

                                <div class='input-group mb-2 mr-sm-2 mb-sm-0 form-group'>
                                    <div class='input-group-addon'>
                                        <span class='glyphicon glyphicon-map-marker'></span>
                                    </div>
                                    <input type='text' name='e_address' class='form-control ' value= '$item->e_address'  disabled>
                                </div>
                                    <button type='button' class='btn btn-danger btn-block' onclick='  deleteConfHotel($item->id)'>
                                         Հեռացնել 
                                    </button>
                                    <button type='button' class='btn btn-success btn-block' onclick='changeItemHotel($item->id)'>
                                        Փոփոխել 
                                    </button>
                            </div>
                        </div>
                    </div>";
                    loadJS(array(
                        'deleteItems' => 'deleteItems'
                        ),base_url()
                    );
                    break;
                case 'e_charges':
                // echo "<div class='col-xs-6 col-sm-3'>
                //         <div class='panel panel-default'>
                //             <div class='panel-heading'>".loadTableName('e_charges')."</div>
                //                 <div class='panel-body' ><div class='form-group'>
                //                     <label for='exampleInputUsername'>նկարագրություն</label>
                //                     <input type='text' class='form-control' id=' placeholder=' Enter Name' value='$item->e_name'>
                //                 </div>
                //                 <label for='exampleInputUsername'>Տեսակ</label>
                //                 <div class='checkbox'>
                //                     <label><input type='radio' value='gaz' name='' required=''> Գազալցակայան</label>
                //                 </div>
                //                 <div class='checkbox'>
                //                     <label><input type='radio' value='gaz' name='' required=''> Բենզալցակայան</label>
                //                 </div>
                //                 <div class='input-group mb-2 mr-sm-2 mb-sm-0 addres_for_add'>
                //                     <div class='input-group-addon'>
                //                         <span class='glyphicon glyphicon-map-marker'></span>
                //                     </div>
                //                     <input type='text' name='e_address' class='form-control ' value= '$item->e_address' required=' autocomplete='off' disabled>
                //                     <input type='hidden' name='lat' class='lat' autocomplete='off'>
                //                     <input type='hidden' name='lng' class='lng' autocomplete='off'>
                //                 </div>
                //             </div>
                //         </div>
                //     </div>";
                    break;
                // case 'e_users':
                //     $ci->load->model('Register_users_model');
                //     break;
                case 'e_beauty_salon':
                    $table_model = 'Beauty_salon_model';
                    echo "<div class='col-xs-6 col-sm-3'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>".loadTableName('e_beauty_salon')."</div>
                                <div class='panel-body'>
                                <div class='input-group mb-2 mr-sm-2 mb-sm-0 form-group'>
                                    <div class='input-group-addon'>
                                        <span class='glyphicon glyphicon-align-left'></span>
                                    </div>
                                <input type='text' name='e_address' class='form-control ' value= '$item->e_salon_name'  disabled>
                                </div>

                                <div class='input-group mb-2 mr-sm-2 mb-sm-0 form-group'>
                                    <div class='input-group-addon'>
                                        <i class='glyphicon glyphicon-phone-alt'></i>
                                    </div>
                                <input type='text' name='e_address' class='form-control ' value= '$item->e_pnumber'  disabled>
                                </div>

                                <div class='input-group mb-2 mr-sm-2 mb-sm-0 form-group'>
                                    <div class='input-group-addon'>
                                        <span class='glyphicon glyphicon-map-marker'></span>
                                    </div>
                                    <input type='text' name='e_address' class='form-control ' value= '$item->e_address'  disabled>
                                </div>
                                    <button type='button' class='btn btn-danger btn-block' onclick='  deleteConfBeauty($item->id)'>
                                         Հեռացնել 
                                    </button>
                                    <button type='button' class='btn btn-success btn-block' onclick='changeItemBeauty($item->id)'>
                                        Փոփոխել 
                                    </button>
                            </div>
                        </div>
                    </div>";
                    loadJS(array(
                        'deleteItems' => 'deleteItems'
                        ),base_url()
                    );
                break;

                

                case 'e_car_washes':
                // $ci->load->model('Car_wash_model');
                // $results = $ci->Car_wash_model->getrecords(array('e_user_id'=>$ci->auth->getUser()->id));
                // out($results);
                // foreach ($results as $result) {
                //     echo 
                //     "<div class='col-xs-6 col-sm-3'>
                //         <div class='panel panel-default'>
                //             <div class='panel-heading'>".loadTableName('e_car_washes')."</div>
                //                 <div class='panel-body' ><div class='form-group'>
                //                     <label for='exampleInputUsername'>Անվանում</label>
                //                     <input type='text' class='form-control' id=' placeholder=' Enter Name' value='$item->e_name'>
                //                 </div>
                //                 <div class='checkbox'>
                //                     <label ><input type='checkbox' name='round_the_clock' onclick='SetdisableORenable()'>24 ժամ</label>
                //                 </div>
                //                 <div class='form-group'>
                //                     <label for='telephone'>Աշխ.ժամի սկիզբ</label>
                //                     <input  class='form-control' value='$item->e_time_1'>
                //                 </div>
                //                 <div class='form-group'>
                //                     <label for='telephone'>Աշխ.ժամի ավարտ</label>
                //                     <input  class='form-control'  value='$item->e_time_2'>
                //                 </div>
                //                 <div class='input-group mb-2 mr-sm-2 mb-sm-0 addres_for_add'>
                //                     <div class='input-group-addon'>
                //                         <span class='glyphicon glyphicon-map-marker'></span>
                //                     </div>
                //                     <input type='text' name='e_address' class='form-control ' value= '$item->e_address' required=' autocomplete='off' disabled>
                //                     <input type='hidden' name='lat' class='lat' autocomplete='off'>
                //                     <input type='hidden' name='lng' class='lng' autocomplete='off'>
                //                 </div>
                //             </div>
                //         </div>
                //     </div>";
                // // }
                break;

                default:
                    # code...
                    break;
            }
            // out( $modelName);
        }
    }
}

if (!function_exists('loadTableName')) {
    function loadTableName($table =null) {
        if(!is_null($table)){
            // $ci =& get_instance();
            switch ($table) {
                case 'e_users':
                    break;
                case 'e_terminals':
                    return "Տերմինալ";
                    break;
                case 'e_shop':
                    return "Խանութ, սրահ, Սուպերմարկետ";
                    break;
                case 'e_restaurants':
                    return "Ռեստորան";
                    break;
                case 'e_rent_home':
                    return "Վարձով Բնակարաններ ";
                    break;
                case 'e_pharmacy':
                    return "Դեղատուն";
                    break;
                case 'e_hotels':
                    return "Հյուրանոց";
                    break;
                case 'e_charges':
                    return "Գազալցակայան,Բենզալցակայան";
                    break;
                case 'e_users':
                    // return "Վարձով Բնակարաններ ";
                    break;
                case 'e_beauty_salon':
                    return "Գեղեցկության սրահ";
                    break;
                case 'e_car_washes':
                    return "Ավտոլվացում";
                    break;

                default:
                    # code...
                    break;
            }
            // out( $modelName);
        }
    }
}
?>
<script>
    function SetdisableORenable() {
    if($(".time_input").attr("disabled") == 'disabled'){
        $("input").removeAttr('disabled');
        $("input[name=round_the_clock]").val("OFF");
    }else{
        $("input[name=e_time_1]").val('');
        $("input[name=e_time_2]").val('');
        $(".time_input").attr("disabled", 'disabled');
        $("input[name=round_the_clock]").val("ON");

    }
}
</script>