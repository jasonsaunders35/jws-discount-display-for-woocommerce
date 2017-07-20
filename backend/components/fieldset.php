<?php

$selectIds= ['jason_visualdiscount_section_general_group_enabled',
'jason_visualdiscount_section_general_group_style',
'jason_visualdiscount_section_general_group_discountmode',
'jason_visualdiscount_section_general_group_csscolor',
'jason_visualdiscount_section_general_group_cssbackgroundColor',
'jason_visualdiscount_section_general_group_cssboxShadow',
'jason_visualdiscount_section_general_group_cssborderWidth',
'jason_visualdiscount_section_general_group_cssborderColor',
'jason_visualdiscount_section_general_group_cssborderStyle'];

for count($selectIds)  


// update options to submited values
update_option( 'jws_discount_'.$x, $_POST['jws_discount_'.$x] );
update_option( 'jws_utm_content_'.$x, $_POST['jws_utm_content_'.$x]);



// put updated options into variables
$jws_discount[$x] = get_option('jws_discount_'.$x, 0);
$jws_utm_content[$x] = get_option('jws_utm_content_'.$x, 0);
?>


<fieldset class="config collapseable" id="jason_visualdiscount_section_general_group">
   <legend>Default Settings</legend>
   <div class="comment">
      <ul class="jason visualdiscount products-grid products-grid--max-3-col first last odd">
         <li class="item last">
            <a href="javascript:void(0)" title="Example Product Name" class="product-image">
            <span class="bubble nominal" style="color: white; background-color: black; border-width: 0px; border-color: black; display: block;"><span class="discount">20%</span><span class="off">Off</span></span>
            <img width="200" height="200" src="http://m1.net/media/jason/visualdiscount/sampleproduct.png" alt="Example Product Name">
            </a>
            <div class="product-info">
               <h2 class="product-name">
                  <span class="bubble" style="color: white; background-color: black; border-width: 0px; border-color: black; display: none;"><span class="discount">20%</span><span class="off">Off</span></span>
                  <a href="javascript:void(0)" title="">Example Product Name</a>
               </h2>
            </div>
         </li>
      </ul>
   </div>
   <table cellspacing="0" class="form-list">
      <colgroup class="label"></colgroup>
      <colgroup class="value"></colgroup>
      <colgroup class="scope-label"></colgroup>
      <colgroup class=""></colgroup>
      <tbody>
         <tr id="row_jason_visualdiscount_section_general_group_enabled">
            <td class="label"><label for="jason_visualdiscount_section_general_group_enabled"> Enabled</label></td>
            <td class="value">
               <select id="jason_visualdiscount_section_general_group_enabled" name="groups[general_group][fields][enabled][value]" class=" select">
                  <option value="1">Yes</option>
                  <option value="0">No</option>
               </select>
            </td>
            <td class="scope-label">[STORE VIEW]</td>
            <td class=""></td>
         </tr>
         <tr id="row_jason_visualdiscount_section_general_group_style">
            <td class="label"><label for="jason_visualdiscount_section_general_group_style"> Display Style</label></td>
            <td class="value">
               <select id="jason_visualdiscount_section_general_group_style" name="groups[general_group][fields][style][value]" class=" select">
                  <option value="bubble">Bubble</option>
                  <option value="corner">Corner</option>
                  <option value="box">Box</option>
                  <option value="beforeproductname">Before Product Name</option>
               </select>
            </td>
            <td class="scope-label">[STORE VIEW]</td>
            <td class=""></td>
         </tr>
         <tr id="row_jason_visualdiscount_section_general_group_discountmode">
            <td class="label"><label for="jason_visualdiscount_section_general_group_discountmode"> Discount Mode</label></td>
            <td class="value">
               <select id="jason_visualdiscount_section_general_group_discountmode" name="groups[general_group][fields][discountmode][value]" class=" select">
                  <option value="percent">Percent Off</option>
                  <option value="nominal">Dollars Off</option>
               </select>
            </td>
            <td class="scope-label">[STORE VIEW]</td>
            <td class=""></td>
         </tr>
         <tr id="row_jason_visualdiscount_section_general_group_csscolor">
            <td class="label"><label for="jason_visualdiscount_section_general_group_csscolor"> Font Color</label></td>
            <td class="value">
               <select id="jason_visualdiscount_section_general_group_csscolor" name="groups[general_group][fields][csscolor][value]" class=" select">
                  <option value=""></option>
                  <option value="AliceBlue" style="color: aliceblue;">AliceBlue</option>
                  <option value="AntiqueWhite" style="color: antiquewhite;">AntiqueWhite</option>
                  <option value="Aqua" style="color: aqua;">Aqua</option>
                  <option value="Aquamarine" style="color: aquamarine;">Aquamarine</option>
                  <option value="Azure" style="color: azure;">Azure</option>
                  <option value="Beige" style="color: beige;">Beige</option>
                  <option value="Bisque" style="color: bisque;">Bisque</option>
                  <option value="Black" style="color: black;">Black</option>
                  <option value="BlanchedAlmond" style="color: blanchedalmond;">BlanchedAlmond</option>
                  <option value="Blue" style="color: blue;">Blue</option>
                  <option value="BlueViolet" style="color: blueviolet;">BlueViolet</option>
                  <option value="Brown" style="color: brown;">Brown</option>
                  <option value="BurlyWood" style="color: burlywood;">BurlyWood</option>
                  <option value="CadetBlue" style="color: cadetblue;">CadetBlue</option>
                  <option value="Chartreuse" style="color: chartreuse;">Chartreuse</option>
                  <option value="Chocolate" style="color: chocolate;">Chocolate</option>
                  <option value="Coral" style="color: coral;">Coral</option>
                  <option value="CornflowerBlue" style="color: cornflowerblue;">CornflowerBlue</option>
                  <option value="Cornsilk" style="color: cornsilk;">Cornsilk</option>
                  <option value="Crimson" style="color: crimson;">Crimson</option>
                  <option value="Cyan" style="color: cyan;">Cyan</option>
                  <option value="DarkBlue" style="color: darkblue;">DarkBlue</option>
                  <option value="DarkCyan" style="color: darkcyan;">DarkCyan</option>
                  <option value="DarkGoldenRod" style="color: darkgoldenrod;">DarkGoldenRod</option>
                  <option value="DarkGray" style="color: darkgray;">DarkGray</option>
                  <option value="DarkGrey" style="color: darkgrey;">DarkGrey</option>
                  <option value="DarkGreen" style="color: darkgreen;">DarkGreen</option>
                  <option value="DarkKhaki" style="color: darkkhaki;">DarkKhaki</option>
                  <option value="DarkMagenta" style="color: darkmagenta;">DarkMagenta</option>
                  <option value="DarkOliveGreen" style="color: darkolivegreen;">DarkOliveGreen</option>
                  <option value="DarkOrange" style="color: darkorange;">DarkOrange</option>
                  <option value="DarkOrchid" style="color: darkorchid;">DarkOrchid</option>
                  <option value="DarkRed" style="color: darkred;">DarkRed</option>
                  <option value="DarkSalmon" style="color: darksalmon;">DarkSalmon</option>
                  <option value="DarkSeaGreen" style="color: darkseagreen;">DarkSeaGreen</option>
                  <option value="DarkSlateBlue" style="color: darkslateblue;">DarkSlateBlue</option>
                  <option value="DarkSlateGray" style="color: darkslategray;">DarkSlateGray</option>
                  <option value="DarkSlateGrey" style="color: darkslategrey;">DarkSlateGrey</option>
                  <option value="DarkTurquoise" style="color: darkturquoise;">DarkTurquoise</option>
                  <option value="DarkViolet" style="color: darkviolet;">DarkViolet</option>
                  <option value="DeepPink" style="color: deeppink;">DeepPink</option>
                  <option value="DeepSkyBlue" style="color: deepskyblue;">DeepSkyBlue</option>
                  <option value="DimGray" style="color: dimgray;">DimGray</option>
                  <option value="DimGrey" style="color: dimgrey;">DimGrey</option>
                  <option value="DodgerBlue" style="color: dodgerblue;">DodgerBlue</option>
                  <option value="FireBrick" style="color: firebrick;">FireBrick</option>
                  <option value="FloralWhite" style="color: floralwhite;">FloralWhite</option>
                  <option value="ForestGreen" style="color: forestgreen;">ForestGreen</option>
                  <option value="Fuchsia" style="color: fuchsia;">Fuchsia</option>
                  <option value="Gainsboro" style="color: gainsboro;">Gainsboro</option>
                  <option value="GhostWhite" style="color: ghostwhite;">GhostWhite</option>
                  <option value="Gold" style="color: gold;">Gold</option>
                  <option value="GoldenRod" style="color: goldenrod;">GoldenRod</option>
                  <option value="Gray" style="color: gray;">Gray</option>
                  <option value="Grey" style="color: grey;">Grey</option>
                  <option value="Green" style="color: green;">Green</option>
                  <option value="GreenYellow" style="color: greenyellow;">GreenYellow</option>
                  <option value="HoneyDew" style="color: honeydew;">HoneyDew</option>
                  <option value="HotPink" style="color: hotpink;">HotPink</option>
                  <option value="IndianRed" style="color: indianred;">IndianRed</option>
                  <option value="Indigo" style="color: indigo;">Indigo</option>
                  <option value="Ivory" style="color: ivory;">Ivory</option>
                  <option value="Khaki" style="color: khaki;">Khaki</option>
                  <option value="Lavender" style="color: lavender;">Lavender</option>
                  <option value="LavenderBlush" style="color: lavenderblush;">LavenderBlush</option>
                  <option value="LawnGreen" style="color: lawngreen;">LawnGreen</option>
                  <option value="LemonChiffon" style="color: lemonchiffon;">LemonChiffon</option>
                  <option value="LightBlue" style="color: lightblue;">LightBlue</option>
                  <option value="LightCoral" style="color: lightcoral;">LightCoral</option>
                  <option value="LightCyan" style="color: lightcyan;">LightCyan</option>
                  <option value="LightGoldenRodYellow" style="color: lightgoldenrodyellow;">LightGoldenRodYellow</option>
                  <option value="LightGray" style="color: lightgray;">LightGray</option>
                  <option value="LightGrey" style="color: lightgrey;">LightGrey</option>
                  <option value="LightGreen" style="color: lightgreen;">LightGreen</option>
                  <option value="LightPink" style="color: lightpink;">LightPink</option>
                  <option value="LightSalmon" style="color: lightsalmon;">LightSalmon</option>
                  <option value="LightSeaGreen" style="color: lightseagreen;">LightSeaGreen</option>
                  <option value="LightSkyBlue" style="color: lightskyblue;">LightSkyBlue</option>
                  <option value="LightSlateGray" style="color: lightslategray;">LightSlateGray</option>
                  <option value="LightSlateGrey" style="color: lightslategrey;">LightSlateGrey</option>
                  <option value="LightSteelBlue" style="color: lightsteelblue;">LightSteelBlue</option>
                  <option value="LightYellow" style="color: lightyellow;">LightYellow</option>
                  <option value="Lime" style="color: lime;">Lime</option>
                  <option value="LimeGreen" style="color: limegreen;">LimeGreen</option>
                  <option value="Linen" style="color: linen;">Linen</option>
                  <option value="Magenta" style="color: magenta;">Magenta</option>
                  <option value="Maroon" style="color: maroon;">Maroon</option>
                  <option value="MediumAquaMarine" style="color: mediumaquamarine;">MediumAquaMarine</option>
                  <option value="MediumBlue" style="color: mediumblue;">MediumBlue</option>
                  <option value="MediumOrchid" style="color: mediumorchid;">MediumOrchid</option>
                  <option value="MediumPurple" style="color: mediumpurple;">MediumPurple</option>
                  <option value="MediumSeaGreen" style="color: mediumseagreen;">MediumSeaGreen</option>
                  <option value="MediumSlateBlue" style="color: mediumslateblue;">MediumSlateBlue</option>
                  <option value="MediumSpringGreen" style="color: mediumspringgreen;">MediumSpringGreen</option>
                  <option value="MediumTurquoise" style="color: mediumturquoise;">MediumTurquoise</option>
                  <option value="MediumVioletRed" style="color: mediumvioletred;">MediumVioletRed</option>
                  <option value="MidnightBlue" style="color: midnightblue;">MidnightBlue</option>
                  <option value="MintCream" style="color: mintcream;">MintCream</option>
                  <option value="MistyRose" style="color: mistyrose;">MistyRose</option>
                  <option value="Moccasin" style="color: moccasin;">Moccasin</option>
                  <option value="NavajoWhite" style="color: navajowhite;">NavajoWhite</option>
                  <option value="Navy" style="color: navy;">Navy</option>
                  <option value="OldLace" style="color: oldlace;">OldLace</option>
                  <option value="Olive" style="color: olive;">Olive</option>
                  <option value="OliveDrab" style="color: olivedrab;">OliveDrab</option>
                  <option value="Orange" style="color: orange;">Orange</option>
                  <option value="OrangeRed" style="color: orangered;">OrangeRed</option>
                  <option value="Orchid" style="color: orchid;">Orchid</option>
                  <option value="PaleGoldenRod" style="color: palegoldenrod;">PaleGoldenRod</option>
                  <option value="PaleGreen" style="color: palegreen;">PaleGreen</option>
                  <option value="PaleTurquoise" style="color: paleturquoise;">PaleTurquoise</option>
                  <option value="PaleVioletRed" style="color: palevioletred;">PaleVioletRed</option>
                  <option value="PapayaWhip" style="color: papayawhip;">PapayaWhip</option>
                  <option value="PeachPuff" style="color: peachpuff;">PeachPuff</option>
                  <option value="Peru" style="color: peru;">Peru</option>
                  <option value="Pink" style="color: pink;">Pink</option>
                  <option value="Plum" style="color: plum;">Plum</option>
                  <option value="PowderBlue" style="color: powderblue;">PowderBlue</option>
                  <option value="Purple" style="color: purple;">Purple</option>
                  <option value="RebeccaPurple" style="color: rebeccapurple;">RebeccaPurple</option>
                  <option value="Red" style="color: red;">Red</option>
                  <option value="RosyBrown" style="color: rosybrown;">RosyBrown</option>
                  <option value="RoyalBlue" style="color: royalblue;">RoyalBlue</option>
                  <option value="SaddleBrown" style="color: saddlebrown;">SaddleBrown</option>
                  <option value="Salmon" style="color: salmon;">Salmon</option>
                  <option value="SandyBrown" style="color: sandybrown;">SandyBrown</option>
                  <option value="SeaGreen" style="color: seagreen;">SeaGreen</option>
                  <option value="SeaShell" style="color: seashell;">SeaShell</option>
                  <option value="Sienna" style="color: sienna;">Sienna</option>
                  <option value="Silver" style="color: silver;">Silver</option>
                  <option value="SkyBlue" style="color: skyblue;">SkyBlue</option>
                  <option value="SlateBlue" style="color: slateblue;">SlateBlue</option>
                  <option value="SlateGray" style="color: slategray;">SlateGray</option>
                  <option value="SlateGrey" style="color: slategrey;">SlateGrey</option>
                  <option value="Snow" style="color: snow;">Snow</option>
                  <option value="SpringGreen" style="color: springgreen;">SpringGreen</option>
                  <option value="SteelBlue" style="color: steelblue;">SteelBlue</option>
                  <option value="Tan" style="color: tan;">Tan</option>
                  <option value="Teal" style="color: teal;">Teal</option>
                  <option value="Thistle" style="color: thistle;">Thistle</option>
                  <option value="Tomato" style="color: tomato;">Tomato</option>
                  <option value="Turquoise" style="color: turquoise;">Turquoise</option>
                  <option value="Violet" style="color: violet;">Violet</option>
                  <option value="Wheat" style="color: wheat;">Wheat</option>
                  <option value="White" selected="selected" style="color: white;">White</option>
                  <option value="WhiteSmoke" style="color: whitesmoke;">WhiteSmoke</option>
                  <option value="Yellow" style="color: yellow;">Yellow</option>
                  <option value="YellowGreen" style="color: yellowgreen;">YellowGreen</option>
               </select>
            </td>
            <td class="scope-label">[STORE VIEW]</td>
            <td class=""></td>
         </tr>
         <tr id="row_jason_visualdiscount_section_general_group_cssbackgroundColor">
            <td class="label"><label for="jason_visualdiscount_section_general_group_cssbackgroundColor"> Background Color</label></td>
            <td class="value">
               <select id="jason_visualdiscount_section_general_group_cssbackgroundColor" name="groups[general_group][fields][cssbackgroundColor][value]" class=" select">
                  <option value=""></option>
                  <option value="AliceBlue" style="color: aliceblue;">AliceBlue</option>
                  <option value="AntiqueWhite" style="color: antiquewhite;">AntiqueWhite</option>
                  <option value="Aqua" style="color: aqua;">Aqua</option>
                  <option value="Aquamarine" style="color: aquamarine;">Aquamarine</option>
                  <option value="Azure" style="color: azure;">Azure</option>
                  <option value="Beige" style="color: beige;">Beige</option>
                  <option value="Bisque" style="color: bisque;">Bisque</option>
                  <option value="Black" selected="selected" style="color: black;">Black</option>
                  <option value="BlanchedAlmond" style="color: blanchedalmond;">BlanchedAlmond</option>
                  <option value="Blue" style="color: blue;">Blue</option>
                  <option value="BlueViolet" style="color: blueviolet;">BlueViolet</option>
                  <option value="Brown" style="color: brown;">Brown</option>
                  <option value="BurlyWood" style="color: burlywood;">BurlyWood</option>
                  <option value="CadetBlue" style="color: cadetblue;">CadetBlue</option>
                  <option value="Chartreuse" style="color: chartreuse;">Chartreuse</option>
                  <option value="Chocolate" style="color: chocolate;">Chocolate</option>
                  <option value="Coral" style="color: coral;">Coral</option>
                  <option value="CornflowerBlue" style="color: cornflowerblue;">CornflowerBlue</option>
                  <option value="Cornsilk" style="color: cornsilk;">Cornsilk</option>
                  <option value="Crimson" style="color: crimson;">Crimson</option>
                  <option value="Cyan" style="color: cyan;">Cyan</option>
                  <option value="DarkBlue" style="color: darkblue;">DarkBlue</option>
                  <option value="DarkCyan" style="color: darkcyan;">DarkCyan</option>
                  <option value="DarkGoldenRod" style="color: darkgoldenrod;">DarkGoldenRod</option>
                  <option value="DarkGray" style="color: darkgray;">DarkGray</option>
                  <option value="DarkGrey" style="color: darkgrey;">DarkGrey</option>
                  <option value="DarkGreen" style="color: darkgreen;">DarkGreen</option>
                  <option value="DarkKhaki" style="color: darkkhaki;">DarkKhaki</option>
                  <option value="DarkMagenta" style="color: darkmagenta;">DarkMagenta</option>
                  <option value="DarkOliveGreen" style="color: darkolivegreen;">DarkOliveGreen</option>
                  <option value="DarkOrange" style="color: darkorange;">DarkOrange</option>
                  <option value="DarkOrchid" style="color: darkorchid;">DarkOrchid</option>
                  <option value="DarkRed" style="color: darkred;">DarkRed</option>
                  <option value="DarkSalmon" style="color: darksalmon;">DarkSalmon</option>
                  <option value="DarkSeaGreen" style="color: darkseagreen;">DarkSeaGreen</option>
                  <option value="DarkSlateBlue" style="color: darkslateblue;">DarkSlateBlue</option>
                  <option value="DarkSlateGray" style="color: darkslategray;">DarkSlateGray</option>
                  <option value="DarkSlateGrey" style="color: darkslategrey;">DarkSlateGrey</option>
                  <option value="DarkTurquoise" style="color: darkturquoise;">DarkTurquoise</option>
                  <option value="DarkViolet" style="color: darkviolet;">DarkViolet</option>
                  <option value="DeepPink" style="color: deeppink;">DeepPink</option>
                  <option value="DeepSkyBlue" style="color: deepskyblue;">DeepSkyBlue</option>
                  <option value="DimGray" style="color: dimgray;">DimGray</option>
                  <option value="DimGrey" style="color: dimgrey;">DimGrey</option>
                  <option value="DodgerBlue" style="color: dodgerblue;">DodgerBlue</option>
                  <option value="FireBrick" style="color: firebrick;">FireBrick</option>
                  <option value="FloralWhite" style="color: floralwhite;">FloralWhite</option>
                  <option value="ForestGreen" style="color: forestgreen;">ForestGreen</option>
                  <option value="Fuchsia" style="color: fuchsia;">Fuchsia</option>
                  <option value="Gainsboro" style="color: gainsboro;">Gainsboro</option>
                  <option value="GhostWhite" style="color: ghostwhite;">GhostWhite</option>
                  <option value="Gold" style="color: gold;">Gold</option>
                  <option value="GoldenRod" style="color: goldenrod;">GoldenRod</option>
                  <option value="Gray" style="color: gray;">Gray</option>
                  <option value="Grey" style="color: grey;">Grey</option>
                  <option value="Green" style="color: green;">Green</option>
                  <option value="GreenYellow" style="color: greenyellow;">GreenYellow</option>
                  <option value="HoneyDew" style="color: honeydew;">HoneyDew</option>
                  <option value="HotPink" style="color: hotpink;">HotPink</option>
                  <option value="IndianRed" style="color: indianred;">IndianRed</option>
                  <option value="Indigo" style="color: indigo;">Indigo</option>
                  <option value="Ivory" style="color: ivory;">Ivory</option>
                  <option value="Khaki" style="color: khaki;">Khaki</option>
                  <option value="Lavender" style="color: lavender;">Lavender</option>
                  <option value="LavenderBlush" style="color: lavenderblush;">LavenderBlush</option>
                  <option value="LawnGreen" style="color: lawngreen;">LawnGreen</option>
                  <option value="LemonChiffon" style="color: lemonchiffon;">LemonChiffon</option>
                  <option value="LightBlue" style="color: lightblue;">LightBlue</option>
                  <option value="LightCoral" style="color: lightcoral;">LightCoral</option>
                  <option value="LightCyan" style="color: lightcyan;">LightCyan</option>
                  <option value="LightGoldenRodYellow" style="color: lightgoldenrodyellow;">LightGoldenRodYellow</option>
                  <option value="LightGray" style="color: lightgray;">LightGray</option>
                  <option value="LightGrey" style="color: lightgrey;">LightGrey</option>
                  <option value="LightGreen" style="color: lightgreen;">LightGreen</option>
                  <option value="LightPink" style="color: lightpink;">LightPink</option>
                  <option value="LightSalmon" style="color: lightsalmon;">LightSalmon</option>
                  <option value="LightSeaGreen" style="color: lightseagreen;">LightSeaGreen</option>
                  <option value="LightSkyBlue" style="color: lightskyblue;">LightSkyBlue</option>
                  <option value="LightSlateGray" style="color: lightslategray;">LightSlateGray</option>
                  <option value="LightSlateGrey" style="color: lightslategrey;">LightSlateGrey</option>
                  <option value="LightSteelBlue" style="color: lightsteelblue;">LightSteelBlue</option>
                  <option value="LightYellow" style="color: lightyellow;">LightYellow</option>
                  <option value="Lime" style="color: lime;">Lime</option>
                  <option value="LimeGreen" style="color: limegreen;">LimeGreen</option>
                  <option value="Linen" style="color: linen;">Linen</option>
                  <option value="Magenta" style="color: magenta;">Magenta</option>
                  <option value="Maroon" style="color: maroon;">Maroon</option>
                  <option value="MediumAquaMarine" style="color: mediumaquamarine;">MediumAquaMarine</option>
                  <option value="MediumBlue" style="color: mediumblue;">MediumBlue</option>
                  <option value="MediumOrchid" style="color: mediumorchid;">MediumOrchid</option>
                  <option value="MediumPurple" style="color: mediumpurple;">MediumPurple</option>
                  <option value="MediumSeaGreen" style="color: mediumseagreen;">MediumSeaGreen</option>
                  <option value="MediumSlateBlue" style="color: mediumslateblue;">MediumSlateBlue</option>
                  <option value="MediumSpringGreen" style="color: mediumspringgreen;">MediumSpringGreen</option>
                  <option value="MediumTurquoise" style="color: mediumturquoise;">MediumTurquoise</option>
                  <option value="MediumVioletRed" style="color: mediumvioletred;">MediumVioletRed</option>
                  <option value="MidnightBlue" style="color: midnightblue;">MidnightBlue</option>
                  <option value="MintCream" style="color: mintcream;">MintCream</option>
                  <option value="MistyRose" style="color: mistyrose;">MistyRose</option>
                  <option value="Moccasin" style="color: moccasin;">Moccasin</option>
                  <option value="NavajoWhite" style="color: navajowhite;">NavajoWhite</option>
                  <option value="Navy" style="color: navy;">Navy</option>
                  <option value="OldLace" style="color: oldlace;">OldLace</option>
                  <option value="Olive" style="color: olive;">Olive</option>
                  <option value="OliveDrab" style="color: olivedrab;">OliveDrab</option>
                  <option value="Orange" style="color: orange;">Orange</option>
                  <option value="OrangeRed" style="color: orangered;">OrangeRed</option>
                  <option value="Orchid" style="color: orchid;">Orchid</option>
                  <option value="PaleGoldenRod" style="color: palegoldenrod;">PaleGoldenRod</option>
                  <option value="PaleGreen" style="color: palegreen;">PaleGreen</option>
                  <option value="PaleTurquoise" style="color: paleturquoise;">PaleTurquoise</option>
                  <option value="PaleVioletRed" style="color: palevioletred;">PaleVioletRed</option>
                  <option value="PapayaWhip" style="color: papayawhip;">PapayaWhip</option>
                  <option value="PeachPuff" style="color: peachpuff;">PeachPuff</option>
                  <option value="Peru" style="color: peru;">Peru</option>
                  <option value="Pink" style="color: pink;">Pink</option>
                  <option value="Plum" style="color: plum;">Plum</option>
                  <option value="PowderBlue" style="color: powderblue;">PowderBlue</option>
                  <option value="Purple" style="color: purple;">Purple</option>
                  <option value="RebeccaPurple" style="color: rebeccapurple;">RebeccaPurple</option>
                  <option value="Red" style="color: red;">Red</option>
                  <option value="RosyBrown" style="color: rosybrown;">RosyBrown</option>
                  <option value="RoyalBlue" style="color: royalblue;">RoyalBlue</option>
                  <option value="SaddleBrown" style="color: saddlebrown;">SaddleBrown</option>
                  <option value="Salmon" style="color: salmon;">Salmon</option>
                  <option value="SandyBrown" style="color: sandybrown;">SandyBrown</option>
                  <option value="SeaGreen" style="color: seagreen;">SeaGreen</option>
                  <option value="SeaShell" style="color: seashell;">SeaShell</option>
                  <option value="Sienna" style="color: sienna;">Sienna</option>
                  <option value="Silver" style="color: silver;">Silver</option>
                  <option value="SkyBlue" style="color: skyblue;">SkyBlue</option>
                  <option value="SlateBlue" style="color: slateblue;">SlateBlue</option>
                  <option value="SlateGray" style="color: slategray;">SlateGray</option>
                  <option value="SlateGrey" style="color: slategrey;">SlateGrey</option>
                  <option value="Snow" style="color: snow;">Snow</option>
                  <option value="SpringGreen" style="color: springgreen;">SpringGreen</option>
                  <option value="SteelBlue" style="color: steelblue;">SteelBlue</option>
                  <option value="Tan" style="color: tan;">Tan</option>
                  <option value="Teal" style="color: teal;">Teal</option>
                  <option value="Thistle" style="color: thistle;">Thistle</option>
                  <option value="Tomato" style="color: tomato;">Tomato</option>
                  <option value="Turquoise" style="color: turquoise;">Turquoise</option>
                  <option value="Violet" style="color: violet;">Violet</option>
                  <option value="Wheat" style="color: wheat;">Wheat</option>
                  <option value="White" style="color: white;">White</option>
                  <option value="WhiteSmoke" style="color: whitesmoke;">WhiteSmoke</option>
                  <option value="Yellow" style="color: yellow;">Yellow</option>
                  <option value="YellowGreen" style="color: yellowgreen;">YellowGreen</option>
               </select>
            </td>
            <td class="scope-label">[STORE VIEW]</td>
            <td class=""></td>
         </tr>
         <tr id="row_jason_visualdiscount_section_general_group_cssboxShadow">
            <td class="label"><label for="jason_visualdiscount_section_general_group_cssboxShadow"> BoxShadow</label></td>
            <td class="value">
               <select id="jason_visualdiscount_section_general_group_cssboxShadow" name="groups[general_group][fields][cssboxShadow][value]" class=" select">
                  <option value="" selected="selected"></option>
                  <option value="none">No</option>
                  <option value="-1px 1px 2px gray">Yes</option>
               </select>
            </td>
            <td class="scope-label">[STORE VIEW]</td>
            <td class=""></td>
         </tr>
         <tr id="row_jason_visualdiscount_section_general_group_cssborderWidth">
            <td class="label"><label for="jason_visualdiscount_section_general_group_cssborderWidth"> Border Width</label></td>
            <td class="value">
               <select id="jason_visualdiscount_section_general_group_cssborderWidth" name="groups[general_group][fields][cssborderWidth][value]" class=" select">
                  <option value="" selected="selected"></option>
                  <option value="0" selected="selected">0 (no border)</option>
                  <option value="1px">1 pixel </option>
                  <option value="2px">2 pixels </option>
                  <option value="3px">3 pixels </option>
                  <option value="4px">4 pixels </option>
                  <option value="5px">5 pixels </option>
               </select>
            </td>
            <td class="scope-label">[STORE VIEW]</td>
            <td class=""></td>
         </tr>
         <tr id="row_jason_visualdiscount_section_general_group_cssborderColor">
            <td class="label"><label for="jason_visualdiscount_section_general_group_cssborderColor"> Border Color</label></td>
            <td class="value">
               <select id="jason_visualdiscount_section_general_group_cssborderColor" name="groups[general_group][fields][cssborderColor][value]" class=" select">
                  <option value=""></option>
                  <option value="AliceBlue" style="color: aliceblue;">AliceBlue</option>
                  <option value="AntiqueWhite" style="color: antiquewhite;">AntiqueWhite</option>
                  <option value="Aqua" style="color: aqua;">Aqua</option>
                  <option value="Aquamarine" style="color: aquamarine;">Aquamarine</option>
                  <option value="Azure" style="color: azure;">Azure</option>
                  <option value="Beige" style="color: beige;">Beige</option>
                  <option value="Bisque" style="color: bisque;">Bisque</option>
                  <option value="Black" selected="selected" style="color: black;">Black</option>
                  <option value="BlanchedAlmond" style="color: blanchedalmond;">BlanchedAlmond</option>
                  <option value="Blue" style="color: blue;">Blue</option>
                  <option value="BlueViolet" style="color: blueviolet;">BlueViolet</option>
                  <option value="Brown" style="color: brown;">Brown</option>
                  <option value="BurlyWood" style="color: burlywood;">BurlyWood</option>
                  <option value="CadetBlue" style="color: cadetblue;">CadetBlue</option>
                  <option value="Chartreuse" style="color: chartreuse;">Chartreuse</option>
                  <option value="Chocolate" style="color: chocolate;">Chocolate</option>
                  <option value="Coral" style="color: coral;">Coral</option>
                  <option value="CornflowerBlue" style="color: cornflowerblue;">CornflowerBlue</option>
                  <option value="Cornsilk" style="color: cornsilk;">Cornsilk</option>
                  <option value="Crimson" style="color: crimson;">Crimson</option>
                  <option value="Cyan" style="color: cyan;">Cyan</option>
                  <option value="DarkBlue" style="color: darkblue;">DarkBlue</option>
                  <option value="DarkCyan" style="color: darkcyan;">DarkCyan</option>
                  <option value="DarkGoldenRod" style="color: darkgoldenrod;">DarkGoldenRod</option>
                  <option value="DarkGray" style="color: darkgray;">DarkGray</option>
                  <option value="DarkGrey" style="color: darkgrey;">DarkGrey</option>
                  <option value="DarkGreen" style="color: darkgreen;">DarkGreen</option>
                  <option value="DarkKhaki" style="color: darkkhaki;">DarkKhaki</option>
                  <option value="DarkMagenta" style="color: darkmagenta;">DarkMagenta</option>
                  <option value="DarkOliveGreen" style="color: darkolivegreen;">DarkOliveGreen</option>
                  <option value="DarkOrange" style="color: darkorange;">DarkOrange</option>
                  <option value="DarkOrchid" style="color: darkorchid;">DarkOrchid</option>
                  <option value="DarkRed" style="color: darkred;">DarkRed</option>
                  <option value="DarkSalmon" style="color: darksalmon;">DarkSalmon</option>
                  <option value="DarkSeaGreen" style="color: darkseagreen;">DarkSeaGreen</option>
                  <option value="DarkSlateBlue" style="color: darkslateblue;">DarkSlateBlue</option>
                  <option value="DarkSlateGray" style="color: darkslategray;">DarkSlateGray</option>
                  <option value="DarkSlateGrey" style="color: darkslategrey;">DarkSlateGrey</option>
                  <option value="DarkTurquoise" style="color: darkturquoise;">DarkTurquoise</option>
                  <option value="DarkViolet" style="color: darkviolet;">DarkViolet</option>
                  <option value="DeepPink" style="color: deeppink;">DeepPink</option>
                  <option value="DeepSkyBlue" style="color: deepskyblue;">DeepSkyBlue</option>
                  <option value="DimGray" style="color: dimgray;">DimGray</option>
                  <option value="DimGrey" style="color: dimgrey;">DimGrey</option>
                  <option value="DodgerBlue" style="color: dodgerblue;">DodgerBlue</option>
                  <option value="FireBrick" style="color: firebrick;">FireBrick</option>
                  <option value="FloralWhite" style="color: floralwhite;">FloralWhite</option>
                  <option value="ForestGreen" style="color: forestgreen;">ForestGreen</option>
                  <option value="Fuchsia" style="color: fuchsia;">Fuchsia</option>
                  <option value="Gainsboro" style="color: gainsboro;">Gainsboro</option>
                  <option value="GhostWhite" style="color: ghostwhite;">GhostWhite</option>
                  <option value="Gold" style="color: gold;">Gold</option>
                  <option value="GoldenRod" style="color: goldenrod;">GoldenRod</option>
                  <option value="Gray" style="color: gray;">Gray</option>
                  <option value="Grey" style="color: grey;">Grey</option>
                  <option value="Green" style="color: green;">Green</option>
                  <option value="GreenYellow" style="color: greenyellow;">GreenYellow</option>
                  <option value="HoneyDew" style="color: honeydew;">HoneyDew</option>
                  <option value="HotPink" style="color: hotpink;">HotPink</option>
                  <option value="IndianRed" style="color: indianred;">IndianRed</option>
                  <option value="Indigo" style="color: indigo;">Indigo</option>
                  <option value="Ivory" style="color: ivory;">Ivory</option>
                  <option value="Khaki" style="color: khaki;">Khaki</option>
                  <option value="Lavender" style="color: lavender;">Lavender</option>
                  <option value="LavenderBlush" style="color: lavenderblush;">LavenderBlush</option>
                  <option value="LawnGreen" style="color: lawngreen;">LawnGreen</option>
                  <option value="LemonChiffon" style="color: lemonchiffon;">LemonChiffon</option>
                  <option value="LightBlue" style="color: lightblue;">LightBlue</option>
                  <option value="LightCoral" style="color: lightcoral;">LightCoral</option>
                  <option value="LightCyan" style="color: lightcyan;">LightCyan</option>
                  <option value="LightGoldenRodYellow" style="color: lightgoldenrodyellow;">LightGoldenRodYellow</option>
                  <option value="LightGray" style="color: lightgray;">LightGray</option>
                  <option value="LightGrey" style="color: lightgrey;">LightGrey</option>
                  <option value="LightGreen" style="color: lightgreen;">LightGreen</option>
                  <option value="LightPink" style="color: lightpink;">LightPink</option>
                  <option value="LightSalmon" style="color: lightsalmon;">LightSalmon</option>
                  <option value="LightSeaGreen" style="color: lightseagreen;">LightSeaGreen</option>
                  <option value="LightSkyBlue" style="color: lightskyblue;">LightSkyBlue</option>
                  <option value="LightSlateGray" style="color: lightslategray;">LightSlateGray</option>
                  <option value="LightSlateGrey" style="color: lightslategrey;">LightSlateGrey</option>
                  <option value="LightSteelBlue" style="color: lightsteelblue;">LightSteelBlue</option>
                  <option value="LightYellow" style="color: lightyellow;">LightYellow</option>
                  <option value="Lime" style="color: lime;">Lime</option>
                  <option value="LimeGreen" style="color: limegreen;">LimeGreen</option>
                  <option value="Linen" style="color: linen;">Linen</option>
                  <option value="Magenta" style="color: magenta;">Magenta</option>
                  <option value="Maroon" style="color: maroon;">Maroon</option>
                  <option value="MediumAquaMarine" style="color: mediumaquamarine;">MediumAquaMarine</option>
                  <option value="MediumBlue" style="color: mediumblue;">MediumBlue</option>
                  <option value="MediumOrchid" style="color: mediumorchid;">MediumOrchid</option>
                  <option value="MediumPurple" style="color: mediumpurple;">MediumPurple</option>
                  <option value="MediumSeaGreen" style="color: mediumseagreen;">MediumSeaGreen</option>
                  <option value="MediumSlateBlue" style="color: mediumslateblue;">MediumSlateBlue</option>
                  <option value="MediumSpringGreen" style="color: mediumspringgreen;">MediumSpringGreen</option>
                  <option value="MediumTurquoise" style="color: mediumturquoise;">MediumTurquoise</option>
                  <option value="MediumVioletRed" style="color: mediumvioletred;">MediumVioletRed</option>
                  <option value="MidnightBlue" style="color: midnightblue;">MidnightBlue</option>
                  <option value="MintCream" style="color: mintcream;">MintCream</option>
                  <option value="MistyRose" style="color: mistyrose;">MistyRose</option>
                  <option value="Moccasin" style="color: moccasin;">Moccasin</option>
                  <option value="NavajoWhite" style="color: navajowhite;">NavajoWhite</option>
                  <option value="Navy" style="color: navy;">Navy</option>
                  <option value="OldLace" style="color: oldlace;">OldLace</option>
                  <option value="Olive" style="color: olive;">Olive</option>
                  <option value="OliveDrab" style="color: olivedrab;">OliveDrab</option>
                  <option value="Orange" style="color: orange;">Orange</option>
                  <option value="OrangeRed" style="color: orangered;">OrangeRed</option>
                  <option value="Orchid" style="color: orchid;">Orchid</option>
                  <option value="PaleGoldenRod" style="color: palegoldenrod;">PaleGoldenRod</option>
                  <option value="PaleGreen" style="color: palegreen;">PaleGreen</option>
                  <option value="PaleTurquoise" style="color: paleturquoise;">PaleTurquoise</option>
                  <option value="PaleVioletRed" style="color: palevioletred;">PaleVioletRed</option>
                  <option value="PapayaWhip" style="color: papayawhip;">PapayaWhip</option>
                  <option value="PeachPuff" style="color: peachpuff;">PeachPuff</option>
                  <option value="Peru" style="color: peru;">Peru</option>
                  <option value="Pink" style="color: pink;">Pink</option>
                  <option value="Plum" style="color: plum;">Plum</option>
                  <option value="PowderBlue" style="color: powderblue;">PowderBlue</option>
                  <option value="Purple" style="color: purple;">Purple</option>
                  <option value="RebeccaPurple" style="color: rebeccapurple;">RebeccaPurple</option>
                  <option value="Red" style="color: red;">Red</option>
                  <option value="RosyBrown" style="color: rosybrown;">RosyBrown</option>
                  <option value="RoyalBlue" style="color: royalblue;">RoyalBlue</option>
                  <option value="SaddleBrown" style="color: saddlebrown;">SaddleBrown</option>
                  <option value="Salmon" style="color: salmon;">Salmon</option>
                  <option value="SandyBrown" style="color: sandybrown;">SandyBrown</option>
                  <option value="SeaGreen" style="color: seagreen;">SeaGreen</option>
                  <option value="SeaShell" style="color: seashell;">SeaShell</option>
                  <option value="Sienna" style="color: sienna;">Sienna</option>
                  <option value="Silver" style="color: silver;">Silver</option>
                  <option value="SkyBlue" style="color: skyblue;">SkyBlue</option>
                  <option value="SlateBlue" style="color: slateblue;">SlateBlue</option>
                  <option value="SlateGray" style="color: slategray;">SlateGray</option>
                  <option value="SlateGrey" style="color: slategrey;">SlateGrey</option>
                  <option value="Snow" style="color: snow;">Snow</option>
                  <option value="SpringGreen" style="color: springgreen;">SpringGreen</option>
                  <option value="SteelBlue" style="color: steelblue;">SteelBlue</option>
                  <option value="Tan" style="color: tan;">Tan</option>
                  <option value="Teal" style="color: teal;">Teal</option>
                  <option value="Thistle" style="color: thistle;">Thistle</option>
                  <option value="Tomato" style="color: tomato;">Tomato</option>
                  <option value="Turquoise" style="color: turquoise;">Turquoise</option>
                  <option value="Violet" style="color: violet;">Violet</option>
                  <option value="Wheat" style="color: wheat;">Wheat</option>
                  <option value="White" style="color: white;">White</option>
                  <option value="WhiteSmoke" style="color: whitesmoke;">WhiteSmoke</option>
                  <option value="Yellow" style="color: yellow;">Yellow</option>
                  <option value="YellowGreen" style="color: yellowgreen;">YellowGreen</option>
               </select>
            </td>
            <td class="scope-label">[STORE VIEW]</td>
            <td class=""></td>
         </tr>
         <tr id="row_jason_visualdiscount_section_general_group_cssborderStyle">
            <td class="label"><label for="jason_visualdiscount_section_general_group_cssborderStyle"> Border Style</label></td>
            <td class="value">
               <select id="jason_visualdiscount_section_general_group_cssborderStyle" name="groups[general_group][fields][cssborderStyle][value]" class=" select">
                  <option value="" selected="selected"></option>
                  <option value="solid">Solid</option>
                  <option value="double">Double</option>
                  <option value="dotted">Dotted</option>
                  <option value="dashed">Dashed</option>
                  <option value="groove">Groove</option>
                  <option value="ridge">Ridge</option>
                  <option value="inset">Inset</option>
                  <option value="outset">Outset</option>
               </select>
            </td>
            <td class="scope-label">[STORE VIEW]</td>
            <td class=""></td>
         </tr>
      </tbody>
   </table>
</fieldset>