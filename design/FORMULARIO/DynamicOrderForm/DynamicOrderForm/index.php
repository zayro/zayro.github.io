<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Dynamic Order Form</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
    
    <!-- BEGIN FOXYCART FILES -->
    <script src="https://css-tricks.foxycart.com/files/foxycart_includes.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="https://css-tricks.foxycart.com/files/foxybox.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="https://css-tricks.foxycart.com/themes/standard/theme.foxybox.css" type="text/css" media="screen" charset="utf-8" />
    <!-- END FOXYCART FILES -->

    
	<script type='text/javascript' src='js/order.js'></script>
</head>

<body>

    <?php include("../header.php"); ?>
    
    <div id="page-wrap">
    
        <h1>Multi-product Quantity-based Order Form</h1>
    
    	<table id="order-table">
    	    <tr>
    	         <th>Product Name</th> 
    	         <th>Quantity</th>
    	         <th>X</th>
    	         <th>Unit Price</th>
    	         <th>=</th>
    	         <th style="text-align: right; padding-right: 30px;">Totals</th> 
    	    </tr>
            <tr class="odd">
                <td class="product-title">Sparkle No. 6&reg; - <em>Dry Line Marking Compound</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="sparkle-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>165</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="sparkle-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="even">
                <td class="product-title">Turface&reg; MVP - <em>Calcined Clay Soil Conditioner</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="turface-mvp-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>300</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="turface-mvp-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="odd">
                <td class="product-title">Turface&reg; Pro League - <em>Calcined Clay Top Dressing</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="turface-pro-league-num-pallets" ></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>340</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="turface-pro-league-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="even">
                <td class="product-title">Turface&reg; Pro League Red - <em>Calcined Clay Top Dressing</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="turface-pro-league-red-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>455</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="turface-pro-league-red-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="odd">
                <td class="product-title">Turface&reg; Quick Dry - <em>Calcined Clay Moisture Absorbent</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="turface-quick-dry-num-pallets" ></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>300</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="turface-quick-dry-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="even">
                <td class="product-title">Turface&reg; Mound Clay Red - <em>Virgin Red Clay</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="turface-mound-clay-red-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>410</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="turface-mound-clay-red-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="odd">
                <td class="product-title">Diamond Pro&reg; Red Infield Conditioner - <em>Vitrified Clay Top Dressing</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="diamond-pro-red-num-pallets" ></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>365</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="diamond-pro-red-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="even">
                <td class="product-title">Diamond Pro&reg; Drying Agent - <em>Calcined Clay Moisture Absorbent</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="diamond-pro-drying-agent-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>340</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="diamond-pro-drying-agent-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="odd">
                <td class="product-title">Diamond Pro&reg; Professional - <em>Calcined Clay Top Dressing</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="diamond-pro-professional-num-pallets" ></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>375</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="diamond-pro-professional-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="even">
                <td class="product-title">Diamond Pro&reg; Top Dressing - <em>Calcined Clay Soil Conditioner</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="diamond-pro-top-dressing-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>340</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="diamond-pro-top-dressing-row-total" disabled="disabled"></input></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: right;">
                    Product SUBTOTAL: <input type="text" class="total-box" value="$0" id="product-subtotal" disabled="disabled"></input>
                </td>
            </tr>
    	</table>
    	
    	<table id="shipping-table">
    	
    	 <tr>
    	     <th>Total Qty.</th>
    	     <th>X</th>
    	     <th>Shipping Rate</th>
    	     <th>=</th>
    	     <th style="text-align: right;">Shipping Total</th>
    	 </tr>
    	 
    	 <tr>
    	     <td id="total-pallets"><input id="total-pallets-input" value="0" type="text" disabled="disabled"></input></td>
    	     <td>X</td>
    	     <td id="shipping-rate">10.00</td>
    	     <td>=</td>
    	     <td style="text-align: right;"><input type="text" class="total-box" value="$0" id="shipping-subtotal" disabled="disabled"></input></td>
    	 </tr>
    	
    	</table>
    	
    	<div class="clear"></div>
    	
        <div style="text-align: right;">
            <span>ORDER TOTAL: </span> 
            <input type="text" class="total-box" value="$0" id="order-total" disabled="disabled"></input>
            
            <br />
            
            <form class="foxycart" action="https://css-tricks.foxycart.com/cart" method="post" accept-charset="utf-8" id="foxycart-order-form">
                
                <input type="hidden" name="name" value="Multi Product Order" />
                <input type="hidden" id="fc-price" name="price" value="0" />

                <input type="submit" value="Submit Order" class="submit" />
                
            </form>
        </div>
        
    </div>
    
    <?php include("../footer.php"); ?>

</body>

</html>
