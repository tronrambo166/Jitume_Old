<template>
    <div class="container" id="">

      
     
<!-- PAGE CONTENT -->
<div class="my-5 w-75 mx-auto">

  <div class="row my-4">
     <div class="col-sm-6">
       <div><p class="h4">Apply for Show - Form</p>
        <p id="msg" class="text-success font-weight-bold"></p>

      </div>
     </div>

   </div>

 <form id="form" class="showForm mb-5" @submit.prevent ="ApplyForShow();" method="POST" enctype="multipart/form-data">
   
   <div class="row">
     <div class="col-sm-6">
       <div><label class="formLabel">Business Name <span style="color:red;">*</span></label>
        <input required class="w-100 py-0" type="text" name="business_name">
      </div>
     </div>

   </div>


   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">Business Website <span style="color:red;">*</span></label>
        <input required class="w-100 py-0" type="text" name="business_site">
      </div>
     </div>
   </div>

   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">Product/Service Description <span style="color:red;">*</span></label>
        <input required class="w-100 py-0" type="text" name="s_description">
      </div>
     </div>
   </div>


   <div class="row my-3">
     <div class="col-sm-6">
   <div>
    <select required name="y_turnover" class="px-2 py-0 w-100">
                    <option hidden >What was your annual turnover last year?<span style="color:red;">*</span></option>

                    <option value="0-10000">$0-$10000</option>
                    <option value="10000-100000">$10000-$100000</option>
                    <option value="100000-250000">$100000-$250000</option>
                    <option value="250000-500000">$250000-$500000</option>
                    <option value="500000-">$500000+</option>
                </select>
      </div>
     </div>
   </div>
   <hr>


<div class="row my-3">
     <div class="col-sm-6">
       <div>
        <p class=" h5"> Owner</p>
        <label class="formLabel">Name <span style="color:red;">*</span></label>
        <input class="w-25 py-0" required placeholder="first" type="text" name="firstN">
        <input class="w-25 py-0" required placeholder="last" type="text" name="lastN">
      </div>
     </div>
   </div>

   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">Legal Name as it Appears on Government-Issued I.D.  <span style="color:red;">*</span></label>
        <input class="w-100 py-0" required type="text" name="legal_name">
      </div>
     </div>
   </div>

<!-- HOME ADDRESS -->
   <div class="row my-2">
     <div class="col-sm-12">
       <div><label class="formLabel">Home Address<span style="color:red;">*</span></label>
        <input class="w-100 py-0" type="text" name="home_address">
      </div>
     </div>
   </div>

   <div class="row my-2">
     <div class="col-sm-12">
       <div><label class="formLabel font-weight-light">Street Address<span style="color:red;">*</span></label>
        <input required class="w-100 py-0" type="text" name="st_address">
      </div>
     </div>
   </div>


<div class="row my-2">
     <div class="col-sm-12">

        <label class="formLabel font-weight-light">Address Line 2 <span style="color:red;">*</span></label>

       <div class="w-100"> 
        <input required style="width:48%" class="px-2 d-inline py-0" placeholder="City" type="text" name="city">
        <input required style="width:48%" class="px-2 float-right d-inline py-0" placeholder="State / Province / Region" type="text" name="state">
      </div>

      <div class="w-100 my-3">   
        <input required style="width:48%" class="px-2 d-inline py-0" placeholder="Postal / Zip Code" type="text" name="zip">
        
        <select style="width:48%" required name="country" class="px-2 float-right d-inline ">
                  <option value="" selected="selected" hidden>Country</option>
                  <option value="United States">United States</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="Australia">Australia</option>
                  <option value="Canada">Canada</option>
                  <option value="France">France</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="India">India</option>
                  <option value="Brazil">Brazil</option>
                  <option value="Afghanistan">Afghanistan</option>
                  <option value="Åland Islands">Åland Islands</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="American Samoa">American Samoa</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Anguilla">Anguilla</option>
                  <option value="Antarctica">Antarctica</option>
                  <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Aruba">Aruba</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bermuda">Bermuda</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Bouvet Island">Bouvet Island</option>
                  <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                  <option value="British Virgin Islands">British Virgin Islands</option>
                  <option value="Brunei">Brunei</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Cape Verde">Cape Verde</option>
                  <option value="Caribbean Netherlands">Caribbean Netherlands</option>
                  <option value="Cayman Islands">Cayman Islands</option>
                  <option value="Central African Republic">Central African Republic</option>
                  <option value="Chad">Chad</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Christmas Island">Christmas Island</option>
                  <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo - Brazzaville">Congo - Brazzaville</option>
                  <option value="Congo - Kinshasa">Congo - Kinshasa</option>
                  <option value="Cook Islands">Cook Islands</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Côte d’Ivoire">Côte d’Ivoire</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Curaçao">Curaçao</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czechia">Czechia</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Falkland Islands">Falkland Islands</option>
                  <option value="Faroe Islands">Faroe Islands</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="French Guiana">French Guiana</option>
                  <option value="French Polynesia">French Polynesia</option>
                  <option value="French Southern Territories">French Southern Territories</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Gibraltar">Gibraltar</option>
                  <option value="Greece">Greece</option>
                  <option value="Greenland">Greenland</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guadeloupe">Guadeloupe</option>
                  <option value="Guam">Guam</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guernsey">Guernsey</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guinea-Bissau">Guinea-Bissau</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Heard &amp; McDonald Islands">Heard &amp; McDonald Islands</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hong Kong SAR China">Hong Kong SAR China</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran">Iran</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Isle of Man">Isle of Man</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jersey">Jersey</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Kosovo">Kosovo</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Laos">Laos</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libya">Libya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Macau SAR China">Macau SAR China</option>
                  <option value="Republic of North Macedonia">Republic of North Macedonia</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Martinique">Martinique</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mayotte">Mayotte</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Micronesia">Micronesia</option>
                  <option value="Moldova">Moldova</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montenegro">Montenegro</option>
                  <option value="Montserrat">Montserrat</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                  <option value="Namibia">Namibia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherlands">Netherlands</option>
                  <option value="New Caledonia">New Caledonia</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Niue">Niue</option>
                  <option value="Norfolk Island">Norfolk Island</option>
                  <option value="North Korea">North Korea</option>
                  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau">Palau</option>
                  <option value="Palestinian Territories">Palestinian Territories</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Pitcairn Islands">Pitcairn Islands</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Réunion">Réunion</option>
                  <option value="Romania">Romania</option>
                  <option value="Russia">Russia</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="São Tomé &amp; Príncipe">São Tomé &amp; Príncipe</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Serbia">Serbia</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Sint Maarten">Sint Maarten</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="South Georgia &amp; South Sandwich Islands">South Georgia &amp; South Sandwich Islands</option>
                  <option value="South Korea">South Korea</option>
                  <option value="South Sudan">South Sudan</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="St. Barthélemy">St. Barthélemy</option>
                  <option value="St. Helena">St. Helena</option>
                  <option value="St. Kitts &amp; Nevis">St. Kitts &amp; Nevis</option>
                  <option value="St. Lucia">St. Lucia</option>
                  <option value="St. Martin">St. Martin</option>
                  <option value="St. Pierre &amp; Miquelon">St. Pierre &amp; Miquelon</option>
                  <option value="St. Vincent &amp; Grenadines">St. Vincent &amp; Grenadines</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Svalbard &amp; Jan Mayen">Svalbard &amp; Jan Mayen</option>
                  <option value="Swaziland">Swaziland</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syria">Syria</option>
                  <option value="Taiwan">Taiwan</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania">Tanzania</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Timor-Leste">Timor-Leste</option>
                  <option value="Togo">Togo</option>
                  <option value="Tokelau">Tokelau</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Turks &amp; Caicos Islands">Turks &amp; Caicos Islands</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="U.S. Outlying Islands">U.S. Outlying Islands</option>
                  <option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
                  <option value="Uganda">Uganda</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="Uruguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Vatican City">Vatican City</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Vietnam">Vietnam</option>
                  <option value="Wallis &amp; Futuna">Wallis &amp; Futuna</option>
                  <option value="Western Sahara">Western Sahara</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
              

        </select>

      </div>

     </div>
   </div>
   <!-- HOME ADDRESS -->


   <!-- Business ADDRESS -->
   <div class="row my-2">
     <div class="col-sm-12">
       <div><label class="formLabel">Business Address<span style="color:red;">*</span></label>
        <input required class="w-100 py-0" type="text" name="B_address">
      </div>
     </div>
   </div>

   <div class="row my-2">
     <div class="col-sm-12">
       <div><label class="formLabel font-weight-light">Street Address<span style="color:red;">*</span></label>
        <input required class="w-100 py-0" type="text" name="B_st_address">
      </div>
     </div>
   </div>


<div class="row my-2">
     <div class="col-sm-12">

        <label class="formLabel font-weight-light">Address Line 2 <span style="color:red;">*</span></label>

       <div class="w-100"> 
        <input required style="width:48%" class="px-2 d-inline py-0" placeholder="City" type="text" name="B_city">
        <input style="width:48%" class="px-2 float-right d-inline py-0" placeholder="State / Province / Region" type="text" name="B_state">
      </div>

      <div class="w-100 my-3">   
        <input style="width:48%" class="px-2 d-inline py-0" placeholder="Postal / Zip Code" type="text" name="B_zip">
        
        <select style="width:48%" required name="B_country" class="px-2 float-right d-inline">
                  <option value="" selected="selected" hidden>Country</option>
                  <option value="United States">United States</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="Australia">Australia</option>
                  <option value="Canada">Canada</option>
                  <option value="France">France</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="India">India</option>
                  <option value="Brazil">Brazil</option>
                  <option value="Afghanistan">Afghanistan</option>
                  <option value="Åland Islands">Åland Islands</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="American Samoa">American Samoa</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Anguilla">Anguilla</option>
                  <option value="Antarctica">Antarctica</option>
                  <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Aruba">Aruba</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bermuda">Bermuda</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Bouvet Island">Bouvet Island</option>
                  <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                  <option value="British Virgin Islands">British Virgin Islands</option>
                  <option value="Brunei">Brunei</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Cape Verde">Cape Verde</option>
                  <option value="Caribbean Netherlands">Caribbean Netherlands</option>
                  <option value="Cayman Islands">Cayman Islands</option>
                  <option value="Central African Republic">Central African Republic</option>
                  <option value="Chad">Chad</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Christmas Island">Christmas Island</option>
                  <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo - Brazzaville">Congo - Brazzaville</option>
                  <option value="Congo - Kinshasa">Congo - Kinshasa</option>
                  <option value="Cook Islands">Cook Islands</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Côte d’Ivoire">Côte d’Ivoire</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Curaçao">Curaçao</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czechia">Czechia</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Falkland Islands">Falkland Islands</option>
                  <option value="Faroe Islands">Faroe Islands</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="French Guiana">French Guiana</option>
                  <option value="French Polynesia">French Polynesia</option>
                  <option value="French Southern Territories">French Southern Territories</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Gibraltar">Gibraltar</option>
                  <option value="Greece">Greece</option>
                  <option value="Greenland">Greenland</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guadeloupe">Guadeloupe</option>
                  <option value="Guam">Guam</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guernsey">Guernsey</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guinea-Bissau">Guinea-Bissau</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Heard &amp; McDonald Islands">Heard &amp; McDonald Islands</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hong Kong SAR China">Hong Kong SAR China</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran">Iran</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Isle of Man">Isle of Man</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jersey">Jersey</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Kosovo">Kosovo</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Laos">Laos</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libya">Libya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Macau SAR China">Macau SAR China</option>
                  <option value="Republic of North Macedonia">Republic of North Macedonia</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Martinique">Martinique</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mayotte">Mayotte</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Micronesia">Micronesia</option>
                  <option value="Moldova">Moldova</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montenegro">Montenegro</option>
                  <option value="Montserrat">Montserrat</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                  <option value="Namibia">Namibia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherlands">Netherlands</option>
                  <option value="New Caledonia">New Caledonia</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Niue">Niue</option>
                  <option value="Norfolk Island">Norfolk Island</option>
                  <option value="North Korea">North Korea</option>
                  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau">Palau</option>
                  <option value="Palestinian Territories">Palestinian Territories</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Philippines">Philippines</option>
                  <option value="Pitcairn Islands">Pitcairn Islands</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Réunion">Réunion</option>
                  <option value="Romania">Romania</option>
                  <option value="Russia">Russia</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="Samoa">Samoa</option>
                  <option value="San Marino">San Marino</option>
                  <option value="São Tomé &amp; Príncipe">São Tomé &amp; Príncipe</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Serbia">Serbia</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Sint Maarten">Sint Maarten</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="South Georgia &amp; South Sandwich Islands">South Georgia &amp; South Sandwich Islands</option>
                  <option value="South Korea">South Korea</option>
                  <option value="South Sudan">South Sudan</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="St. Barthélemy">St. Barthélemy</option>
                  <option value="St. Helena">St. Helena</option>
                  <option value="St. Kitts &amp; Nevis">St. Kitts &amp; Nevis</option>
                  <option value="St. Lucia">St. Lucia</option>
                  <option value="St. Martin">St. Martin</option>
                  <option value="St. Pierre &amp; Miquelon">St. Pierre &amp; Miquelon</option>
                  <option value="St. Vincent &amp; Grenadines">St. Vincent &amp; Grenadines</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Svalbard &amp; Jan Mayen">Svalbard &amp; Jan Mayen</option>
                  <option value="Swaziland">Swaziland</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syria">Syria</option>
                  <option value="Taiwan">Taiwan</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania">Tanzania</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Timor-Leste">Timor-Leste</option>
                  <option value="Togo">Togo</option>
                  <option value="Tokelau">Tokelau</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Turks &amp; Caicos Islands">Turks &amp; Caicos Islands</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="U.S. Outlying Islands">U.S. Outlying Islands</option>
                  <option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
                  <option value="Uganda">Uganda</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="Uruguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Vatican City">Vatican City</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Vietnam">Vietnam</option>
                  <option value="Wallis &amp; Futuna">Wallis &amp; Futuna</option>
                  <option value="Western Sahara">Western Sahara</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
              

        </select>

      </div>

     </div>
   </div>
   <!-- HOME ADDRESS --> <hr>

<div class="row my-2">
     <div class="col-sm-6">
       <div><label class="formLabel">Business Phone <span style="color:red;">*</span></label>
       <input type="tel" id="B_phone" required name="phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
      </div>
     </div>
   </div>

   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">Personal Cell Phone <span style="color:red;">*</span></label>
       <input type="tel" id="B_phone" required name="p_phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
      </div>
     </div>
   </div>

   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">Alternate Phone</label>
       <input type="tel" id="B_phone"  name="a_phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
      </div>
     </div>
   </div>


   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">Email <span style="color:red;">*</span></label>
        <input required class="w-100 py-0" type="email" name="email">
      </div>
     </div>
   </div>

   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">Facebook URL <span style="color:red;"></span></label>
        <input  class="w-100 py-0" type="text" name="facebook">
      </div>
     </div>
   </div>

   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">Twitter URL <span style="color:red;"></span></label>
        <input  class="w-100 py-0" type="text" name="twitter">
      </div>
     </div>
   </div>
   <hr>


<div class="row my-3">
     <div class="col-sm-6">
       <div>
        <p class=" h4 font-weight-light"> EMERGENCY CONTACT INFO</p>
        <label class="formLabel">Name <span style="color:red;"></span></label>
        <input class="w-25 py-0"   placeholder="First" type="text" name="e_firstN">
        <input class="w-25 py-0"   placeholder="Last" type="text" name="e_lastN">
      </div>
     </div>
   </div>


   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">Relationship <span style="color:red;"></span></label>
        <input  class="w-100 py-0" type="text" name="relation">
      </div>
     </div>
   </div>

   <div class="row my-2">
     <div class="col-sm-6">
       <div><label class="formLabel"> Phone <span style="color:red;"></span></label>
       <input type="tel" id="e_phone"  name="e_phone" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
      </div>
     </div>
   </div>


   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">Email <span style="color:red;"></span></label>
        <input  class="w-100 py-0" type="email" name="e_email">
      </div>
     </div>
   </div>

  <div class="row my-3">
  <div class="col-sm-6">
    <label class="formLabel">How did you hear about this opportunity? <span style="color:red;">*</span></label>
   <div>
    <select required name="how_u_heard" class="px-2 py-1 w-100">
                    <option hidden ></option>
                    <option value="Watching the Jitume show">
                      Watching the Jitume show
                    </option>
                          <option value="Social Media">
                      Social Media
                    </option>
                          <option value="Word of mouth">
                      Word of mouth
                    </option>
                          <option value="Business expo">
                      Business expo
                    </option>
      </select>
      </div>
     </div>
   </div>


  <div class="row my-3">
  <div class="col-sm-12">
    <label class="formLabel">Please describe your business in detail <span style="color:red;">*</span></label>
   <div>
    <textarea placeholder="255 letters max" required class="w-100" name="business_details" rows="3"></textarea>
      </div>
     </div>
   </div>

   <div class="row my-3">
  <div class="col-sm-12">
    <label class="formLabel">How did you come up with the idea for your business? <span style="color:red;">*</span></label>
   <div>
    <textarea required class="w-100" name="business_idea" rows="3"></textarea>
      </div>
     </div>
   </div>


    <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">How long have you been in business? <span style="color:red;">*</span></label>
        <input required class="w-100 py-0" type="text" name="how_long">
      </div>
     </div>
   </div>


    <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">Do you have any business partners? <span style="color:red;">*</span></label>
        <input required class="w-100 py-0" type="text" name="business_partners">
      </div>
     </div>
   </div>

   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">How many employees do you have besides yourself or your partner(s)? <span style="color:red;">*</span></label>
        <input required class="w-100 py-0" type="text" name="employees">
      </div>
     </div>
   </div>


   <div class="row my-3">
     <div class="col-sm-6">
       <div><label class="formLabel">How much have you invested into your company? <span style="color:red;">*</span></label>
        <input required class="w-100 py-0" type="text" name="how_m_invested">
      </div>
     </div>
   </div>


   <div class="row my-3">
  <div class="col-sm-12">
    <label class="formLabel">What has been your biggest challenge with your business? <span style="color:red;">*</span></label>
   <div>
    <textarea required class="w-100" name="challenge" rows="3"></textarea>
      </div>
     </div>
   </div>

   <div class="row my-3">
  <div class="col-sm-12">
    <label class="formLabel">How do you feel your business could be improved?  <span style="color:red;">*</span></label>
   <div>
    <textarea required class="w-100" name="business_improved" rows="3"></textarea>
      </div>
     </div>
   </div>

   <div class="row my-3">
  <div class="col-sm-12">
    <label class="formLabel">What part of your business do you feel is suffering the most (staff, customer service, etc.)? <span style="color:red;">*</span></label>
   <div>
    <textarea required class="w-100" name="business_suffering" rows="3"></textarea>
      </div>
     </div>
   </div>

   <div class="row my-3">
  <div class="col-sm-12">
    <label class="formLabel">Is your business currently profitable? If so, what is your annual profit margin? <span style="color:red;">*</span></label>
   <div>
    <textarea required class="w-100" name="business_profitable" rows="3"></textarea>
      </div>
     </div>
   </div>

   <div class="row my-3">
  <div class="col-sm-12">
    <label class="formLabel">What are your short-term goals for your business?  <span style="color:red;">*</span></label>
   <div>
    <textarea required class="w-100" name="short_term_goals" rows="3"></textarea>
      </div>
     </div>
   </div>

   <div class="row my-3">
  <div class="col-sm-12">
    <label class="formLabel">What are your long-term goals for your business? <span style="color:red;">*</span></label>
   <div>
    <textarea required class="w-100" name="long_term_goals" rows="3"></textarea>
      </div>
     </div>
   </div> <hr>

   <div class="row my-2">
     <div class="col-sm-6">
       <div>
        <p class=" h5"> UPLOAD IMAGE(S)</p>
        <label class="formLabel">Attach a File <span style="color:red;"></span></label>
        <input style="border: none;" class="w-50 py-0 fileI"  type="file" @change="handleFile" name="image1">

      </div>
     </div>
   </div>

   <div class="row my-3">
     <div class="col-sm-6">
       <div>
        <label class="formLabel">Attach a File <span style="color:red;"></span></label>
        <input style="border: none;" class="w-50 py-0 fileI"  type="file" @change="handleFile" name="image2">

      </div>
     </div>
   </div>

   <div class="row my-3">
     <div class="col-sm-6">
       <div>
        <label class="formLabel">Attach a File <span style="color:red;"></span></label>
        <input style="border: none;" class="w-50 py-0 fileI"  type="file" @change="handleFile" name="image3">

      </div>
     </div>
   </div>

   <div class="row my-3">
     <div class="col-sm-6">
       <div>
        <label class="formLabel">Attach a File <span style="color:red;"></span></label>
        <input style="border: none;" class="w-50 py-0 fileI"  type="file" @change="handleFile" name="image4">

      </div>
     </div>
   </div> <hr>


  <div class="row my-3">
  <div class="col-sm-12"> 
   <div>
    <textarea style="font-size:11px;" class="p-3 w-100 formLabel font-weight-light" name="tANDc" rows="7">By submitting this application, I hereby consent to the recording, use and reuse by Machete Corporation (“Producer”), NBCUniversal Media LLC (“NBCU”), and any of their respective licensees, successors, assignees, parents, subsidiaries, or affiliated entities, and each of their respective employees, agents, representative, officers and directors (collectively “Releasees”) of my voice, actions, likeness, name, appearance, biographical material, and any information contained in, derived from or obtained in connection with my application to be a participant in “The Profit” (the “Program”) or in any materials submitted by me in connection with my application (collectively “Likeness”), as edited, altered, or modified by the Producer or by any of the other Releasees, in any and all media now known or hereafter devised, worldwide in perpetuity, in or in connection with the Program or any other work. I agree that the Releasees or any of them may use all or any part of my Likeness, and may alter or modify it regardless of whether or not I am recognizable. I further agree that the Releasees exclusively own all right, title, and interest (including, without limitation, all copyrights) in and to any and all recordings made by them and in and to any and all video that I have provided in connection with my application and any other materials that I have provided or may provide in connection with my application or the Program (collectively, the “Materials”), including, without limitation, the right to edit, alter or modify the Materials and to use all or part of the Materials and my Likeness in any and all media now known or hereafter devised worldwide, in perpetuity. Without in any way limiting the foregoing, if I perform or include any music (other than music supplied to me by Producer) in connection with my application or the Program, I represent and warrant that I own all rights to such music, and I grant Producer the right to record, reproduce and publicly perform any such music in and in connection with the Program or any other work. Without in any way limiting the waivers and releases set forth herein, I waive any claims to royalties of any kind, whether accruing now or in the future, from Producer and NBCU for the use of any such music, including, without limitation, any applicable copyright, public performance, mechanical and synchronization royalties. I further agree that Releasees may use my Likeness and the Materials in connection with any promotion, publicity, marketing or advertisement. I grant the rights hereunder whether or not I am selected to participate in the Program in any manner whatsoever. I understand that I will not be paid any money for giving Releasees these rights or for signing this application. I acknowledge that everything stated in this application is true. I understand that any falsely submitted answers can and will be grounds for removal from the casting process and from my subsequent participation in the Program.

Whether or not I am selected to be a participant on the Program, I shall keep in strictest confidence and shall not disclose to any other applicant, participant or other third party at any time (i.e., prior to, during, or after the taping or exhibition of any episode of the Program) any information or materials of any kind, including without limitation, any information or materials concerning or relating to Producer or to NBCU, the business of Producer or NBCU, any program produced by Producer and/or exhibited by NBCU, including, without limitation, any information concerning or relating to the Program, the Program applicants, the Program participants, the location(s) of the Program, the events contained in the Program, or the outcome of any episode of the Program, that I read, hear or otherwise acquire or learn in connection with or as a result of my applying to be a participant on the Program or (if I am selected to be a participant) as the result of my experiences as a participant on the Program (collectively, the “Information and Materials”). I acknowledge and agree that the Information and Materials are confidential and the exclusive property of Producer and/or NBCU. At no time will I ever, directly or indirectly, divulge in any manner or use or permit others to use any of the Information and Materials. I acknowledge and agree that my obligations with respect to confidentiality set forth in this application shall continue in perpetuity or until terminated by NBCU by giving me written notice of termination. In no event will I have the right to terminate my confidentiality obligations under this application. I acknowledge that in the event I breach the confidentiality or any other provisions of this application, my breach may, in the sole discretion of Producer and/or NBCU result in my being disqualified to participate as a participant in the Program. I further acknowledge that a breach by me of any of the confidentiality provisions of this application would cause Producer and NBCU irreparable injury and damage that cannot be reasonably or adequately compensated by damages in an action at law, and, therefore, I hereby expressly agree that Producer and NBCU shall be entitled to injunctive and other equitable relief to prevent and/or cure any breach or threatened breach of any of the confidentiality provisions of this application by me.

    </textarea>
      </div>
     </div>
   </div>


  <div class="row my-3">
  <div class="col-sm-12">
    <label style="font-size:11px;" class="d-inline formLabel">By submitting this form with the above information, you affirm that you meet and agree to the above eligibility requirements, additional terms and releases. <span style="color:red;">*</span></label>
   <div class="row">
    <div style="width:2%;" class=""><input required class="" type="checkbox" name="agree"></div>
    <div class="col-sm-2 mt-1"><label class=" formLabel font-weight-light small">I agree</label></div>
     
      </div>
     </div>
   </div>


   <div class="row mt-3">
  <div class="col-sm-3 h100">
     <input style="border-radius:4px;" type="submit" name="submit" value="Submit" class="px-4 py-1 font-weight-bold border-dark h-100">
     </div>
   </div>





 </form>

  
</div>
<div class="clearfix py-5"></div>

<!-- PAGE CONTENT -->

    

</div>
   
</template>

<script>
   
export default {
    props: ['auth_user'],
    data: () => ({
    category:{},
    catIds:[],
    emptyCat:false,
    image:[]
    }),
methods:{

handleFile (event) {
      let t = this
      const file = event.target.files[0]
      this.image = file

      let filereader = new FileReader();
      filereader.onload = function(e) {
      t.form.showImage = e.target.result
      }
      filereader.readAsDataURL(event.target.files[0])
    },

ApplyForShow(){
 let t = this; 
const form = $('#form');
form.image = t.image;    
$.ajax({
url:'ApplyForShow',
method:'POST',
headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
dataType:'json',
data:form.serialize(),
    success: function (response) {
    console.log(response.data);
    document.getElementById('msg').innerHTML = 'Apply Success!';
    },
    error: function (response) {
    console.log(response);

      }
      });
    
  }
  
  },
  

     mounted() { 
    // this.getCats(),
     return this.$store.dispatch("fetchpro")
      },

     computed:{ 
      allpro(){  return this.$store.getters.getpro }
     }

     

    }
</script>
