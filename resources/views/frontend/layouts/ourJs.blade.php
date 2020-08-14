<script>    
$(document).ready(function(){
    // get category id
    $("#cantidad_ambientes_1").click(function(){
        //alert('clicked');
var brand=[];
$("#cantidad_ambientes_1").each(function(){
if($(this).is(":checked")){
    brand.push(($this).val());
}
});
//alert(brand);
$.ajax({
    type: 'get',
    datatype:'html',
    url: '',
    data:"#cantidad_ambientes_1"+end,
    succes: function(response){
        console.log(response);
        $('#updateDiv').html(response);
    }
});

    });
});
</script>