<script type="text/javascript">

    function formValidation()  
    {
        var ProductCategoryId       = document.getElementById("product_category_id").value ;
        var Title                   = document.getElementById("title").value ;
        var Description             = document.getElementById("description").value ;
        var Price                   = document.getElementById("price").value ;
        
        if ( ProductCategoryId != '' && Title != '' && Description != '' && Price != '') {
                
            if ( !isString( Title) ) {
                
                document.getElementById('titleStatus').innerHTML = 'Product Title must be string type.';   
                var titleField = 'true';
                
            }
            
            if ( !isString( Description ) ) {
                document.getElementById('descriptionStatus').innerHTML = 'Product Description must be string type.';
                var descField = 'true';
            }
            
            if ( !isNumeric( Price) ) {
                
                document.getElementById('priceStatus').innerHTML = 'Product Price must be number type.';   
                var priceField = 'true';
                
            }
            
        } else {
            document.getElementById('categoryidStatus').innerHTML = 'Please select Product Category .';
            document.getElementById('titleStatus').innerHTML = 'Please enter Product Title.';
            document.getElementById('descriptionStatus').innerHTML = 'Please enter Product Description.';
            document.getElementById('priceStatus').innerHTML = 'Please enter Product Price.';
            return false;
        }
        
        if ( titleField == 'true' || descField == 'true' || priceField == 'true') {
            
            return false;
               
        } else {
    
               return true;
        }
        
    }  
        
        function isNumber( stringData )
        {
            var numberPattern = /^\d+$/g;
            
            if( numberPattern.test( stringData ) ) {
                return true;
            } else {
                return false;
            }
        }
       function isString( stringData )
        {
            var stringPattern =  /^[A-Za-z\s]+$/g;
            
            if( stringPattern.test( stringData ) ) {
                //alert("its working");
                //return false;
                return true;
            } else {
                return false;
            }
        }
        
        function isNumeric( stringData )
        {
            var floatPattern = /^([0-9]*\.[0-9]+|[0-9]+)$/g;
            
            if( floatPattern.test( stringData ) ) {
                return true;
            } else {
                return false;
            }
        }
        
</script>
    