<template>
  <div class="container-fluid px-0" style="overflow:hidden;">
    <div class="home_bg" style="">



      <div class="heading">

        <div class="row" style="">

          <div class=" col-sm-12 text-center image" style="">

            <div class="my-4 w-50 mx-auto text-center">
              <h4 style="font-size:27px; font-weight: 500px;" class="text-dark ">
                <!--  <marquee>Invest in Agriculture | Sports/Gaming | Real State | Entertainment | Auto | Finance/Accounting Security | Pets | Domestic Help | Other</marquee> -->
              </h4>
              <h4 class="h3 text-center text_color_1 py-3 main_heading">Your platform to invest in local businesses</h4>
            </div>

        <!-- Search Test -->
        <!-- <div class="" style="min-height:500px;">
          <input id="pac-input"class="controls"type="text"placeholder="Search Box"/>
        </div>    -->
        <!-- Search Test -->

            <form id="form" @submit.prevent="search();" class="d-flex justify-content-center w-100" method="post">

              <div class=" mx-4 text-center row py-0 searchBar text-center">

                 <div style="border-radius: 35px 0 0 35px;" class="py-2 col-sm-3">
                              <input style="border: none;height: 42px;" class="bar bg-white form-control d-inline" type="text" name="listing_name" placeholder="What are you looking for?"></div>

                <div class="col-12 col-sm-4 my-1 py-1 bg-white rounded">
                  <i style="width: 6%;" class="d-inline fa fa-map-marker"></i>
                  <input id="searchbox" onkeyup="suggest(this.value);" style="width: 94%;border: none;height: 42px;"
                    class="px-1 bar bg-white form-control d-inline ml-1 controls" type="text" name="search" value=""
                    placeholder="Location"> <!-- onkeyup="suggest(this.value);" -->
                </div>

                <input type="text" name="lat" id="lat" hidden value="">
                <input type="text" name="lng" id="lng" hidden value="">

                <div class="col-12 col-sm-3 my-1 pt-1  bg-white">
                  <div class="dropdown pt-1 text-left">

                    <select id="category" name="category" class="py-2 home_category_listings">
                      <option class="form-control small" value="">Category</option>

                      <option class="form-control" value="Agriculture">Agriculture</option>
                      <option value="Arts / Culture">Arts/Culture </option>
                      <option value="Auto">Auto</option>
                      <option value="Sports/Gaming">Sports/Gaming</option>
                      <option value="Real State">Real State</option>
                      <option value="Food">Food </option>
                      <option value="Legal">Legal </option>
                      <option value="Security">Security </option>
                      <option value="Media / Internet">Media/Internet </option>

                      <option value="Fashion">Fashion </option>
                      <option value="Technology / Communications">Technology/Communications </option>
                      <option value="Retail">Retail </option>

                      <option value="Finance/Accounting">Finance/Accounting</option>
                      <option value="Pets">Pets</option>
                      <option value="Domestic (Home Help etc)">Domestic (Home Help etc)</option>
                      <option value="Other">Other</option>

                    </select>

                  </div>
                </div>

                <div class="col-12 col-sm-2 my-1 py-1 d-flex justify-content-center align-items-center rounded">
                  <button class="w-100 searchListing px-sm-3 px-2" type="submit">Search</button>
                </div>

              </div>

              <div class="row" style="">
                <div id="result_list" class="text-left search_results"
                  style="">

                </div>
              </div>

            </form>
          </div>

        </div>

      </div>


      <div class="mt-4">

        <div class="cats  text-center pb-0 ">

          <ul class="hlist d-flex justify-content-center mx-4 mx-lg-4 py-0 my-0">

            <li class="nav-item"> <router-link to="category/Arts-Culture">Arts/Culture </router-link></li>
            <li class="nav-item"> <router-link to="category/Auto">Auto </router-link></li>
            <li class="nav-item"> <router-link to="category/Domestic_Home">Domestic (HomeHelp etc) </router-link></li>
            <li class="nav-item"> <router-link to="category/Fashion">Fashion </router-link></li>
            <li class="nav-item"> <router-link to="category/Finance-Accounting">Finance/Accounting </router-link></li>
            <li class="nav-item"> <router-link to="category/Food">Food </router-link></li>
            <li class="nav-item"> <router-link to="category/Legal">Legal </router-link></li>
            <li class="nav-item"> <router-link to="category/Media-Internet">Media/Internet</router-link></li>
            <li class="nav-item"> <router-link to="category/Pets">Pets </router-link></li>
            <li class="nav-item"> <router-link to="category/Retail">Retail </router-link></li>



            <li class="nav-item"> <router-link to="category/Real State">Real Estate </router-link></li>


            <li class="nav-item"> <router-link to="category/Security">Security </router-link></li>
            <li class="nav-item"> <router-link to="category/Sports-Gaming">Sports/Gaming </router-link></li>


            <li class="nav-item"> <router-link to="category/Technology-Communications">Technology/Communications
              </router-link></li>

            <li class="nav-item"><router-link to="category/Other">Other </router-link></li>

          </ul>


        </div>

      </div>

      <div class="my-1 py-0">
        <ul class="text-center py-0 justify-content-center d-flex">
          <li style="list-style-type:none;border-radius:3px;" class="nav-item  mr-4 "> <router-link class=" searchListing  py-1 px-5" to="category/Agriculture">Agriculture </router-link></li>

          <li style="list-style-type:none;border-radius:3px;" class=" nav-item py-0  "> <router-link to="category/Renewable-Energy"
              class=" searchListing  py-1 px-3" style="">Renewable Energy </router-link>
          </li>
        </ul>
      </div>


    </div>





    <!-- HOW IT WORKS 

    <div class=" mt-4 border border-bottom-dark bg-white"></div>

    <div class="container-xl row mx-auto my-5 bg-white pt-3">


      <div class="col-md-5 elementor-top-column elementor-element elementor-element-ce6f4c7" data-id="ce6f4c7"
        data-element_type="column">

        <div class="elementor-column-wrap elementor-element-populated">

          <div class="elementor-widget-wrap">


            <div class="elementor-element elementor-element-ccc6233 elementor-widget elementor-widget-listeo-headline"
              data-id="ccc6233" data-element_type="widget" data-widget_type="listeo-headline.default">

              <div class="text-dark mb-md-3">
                <h2 style="text-align:left;"
                  class="pb-2 secondary_heading h2 headline  headline-aligned-to-left  headline-box "> How It Works? </h2>
              </div>

            </div>

            <div class="elementor-element elementor-element-5df092b elementor-widget elementor-widget-listeo-iconbox"
              data-id="5df092b" data-element_type="widget" data-widget_type="listeo-iconbox.default">
              <div class="elementor-widget-container">

                <div class="icon-box-v3 row">

                  <div class="ibv3-icon col-sm-3">
                    <img width="60px" src="images/CreateAccountGreen.svg">
                  </div>


                  <div class="ibv3-content col-sm-9">
                    <h4>Create an Account</h4>
                    <p>Create an Account as as Investor or Business Owner</p>
                  </div>

                </div>

              </div>
            </div>

            <div class="elementor-element elementor-element-9169400 elementor-widget elementor-widget-listeo-iconbox"
              data-id="9169400" data-element_type="widget" data-widget_type="listeo-iconbox.default">
              <div class="elementor-widget-container">

                <div class="icon-box-v3 row">
                  <div class="ibv3-icon col-sm-3">
                    <img width="60px" src="images/AddInvestGreen.svg">
                  </div>
                  <div class="ibv3-content col-sm-9">
                    <h4>Add/Invest in a Listing</h4>
                    <p>Add a Listing( Your Business) or Invest in a listing</p>
                  </div>
                </div>
              </div>

            </div>


            <div class="elementor-element elementor-element-b9196ce elementor-widget elementor-widget-listeo-iconbox"
              data-id="b9196ce" data-element_type="widget" data-widget_type="listeo-iconbox.default">
              <div class="elementor-widget-container">
                <div class="icon-box-v3 row">
                  <div class="ibv3-icon col-sm-3">
                    <img width="60px" src="images/ApplyForJitumeGreen.svg">
                  </div>

                  <div class="ibv3-content col-sm-9">
                    <h4>Apply For Jitume Show</h4>
                    <p>You can a apply for a chance to get covered in the JITUME SHOW</p>
                  </div>
                </div>
              </div>
            </div>


          </div>

        </div>


      </div>


      <div class="col-md-7 mt-5 mt-md-0 pl-md-5">
        <div class="text-dark mb-md-3">
          <h2 style="text-align:left;" class="secondary_heading h2 headline  headline-aligned-to-left  headline-box pb-2">
            The Show </h2>
        </div>
        <video poster="images/video_preview.png" style="" class="video_player elementor-video" src="videos/Jitume.mp4"
          controls="" controlslist="nodownload"></video>
      </div>

    </div>
     How it works  -->

    <div class="container-md-xl row mx-auto my-2 bg-white pt-3">
      <hr>
      <!-- <div class="pt-1  w-75 mx-auto">
        <h2 style="text-align:left;" class="container-xl secondary_heading"> Latest Businesses </h2>
      </div> -->

      <!--     <div class="card-group my-2 w-75 mx-auto d-md-flex justify-content-center">

        <div v-for="( result, index ) in results" class=" listing col-md-3">
          <router-link :to="`/listingDetails/${result.id}`" class="shadow card border px-2">

            <video v-if="result.file" controls style="width:100%; height:104px;" alt="">
              <source :src="result.file" type="video/mp4">
            </video>

            <img v-else :src="result.image" style="width:100%; height:104px" class="card-img-top" alt="" />

            <div class="p-1 pb-2">

              <h5 class="card_heading mb-0 py-2">{{ result.name }} </h5>

              <p class="card_text pt-1 text-left"><i class="mr-2 fa fa-map-marker"></i>{{ result.location }}</p>

              <p class="card_text"><span class="rounded"><i class="mr-2 fa fa-phone"></i>{{ result.contact }}</span></p>

            </div>

            <div class="amount p-1 pb-0">
              <p class="font-weight-bold">Amount: <span class="font-weight-light"><b>${{ result.investment_needed
              }}</b></span></p>
            </div>

          </router-link>

        </div>

      </div> -->

      <!-- SLider test -->
      <div style="overflow:hidden;" class="row card-group px-3 w-75 mx-auto d-md-flex justify-content-center">
        <hooper :settings="hooperSettings" :itemsToShow="4" :centerMode="true" pagination="no">
          <slide class="listing text-center col-md-4 px-4" v-for="( result, index ) in results" :key="index"
            :index="index">
            <!-- Loop -->
            <div class="mx-auto mt-4">
              <router-link :to="`/listingDetails/${result.id}`" class="shadow card border px-2 pt-2">

                <video v-if="result.file" controls style="width:95%; height:114px;" alt="">
                  <source :src="result.file" type="video/mp4">
                </video>

                <img v-else :src="result.image" style="width:90%; height:118px;" class="card-img-top mx-auto" alt="" />

                <div class="px-3 pb-2">

                  <h5 class="card_heading text-left mb-0 py-2">{{ result.name }} </h5>

                  <p class="loc_p card_text pt-1 text-left"><i class="mr-2 fa fa-map-marker"></i>{{ result.location }}</p>

                  <p class="card_text"><span class="rounded"><i class="mr-2 fa fa-phone"></i>{{ result.contact }}</span>
                  </p>

                </div>

                <div class="amount px-3 pb-0">
                  <p class="font-weight-bold">Amount: <span class="font-weight-light"><b>${{ result.investment_needed
                  }}</b></span></p>
                </div>

              </router-link>
            </div>
            <!-- Loop -->

          </slide>

          <hooper-navigation slot="hooper-addons"></hooper-navigation>
        </hooper>

      </div>


    </div>


    <!-- HOW IT WORKS -->

    <div class=" mt-4 border border-bottom-dark bg-white"></div>

    <div class="container-xl row mx-auto my-5 bg-white pt-3">


      <div class="elementor-top-column elementor-element elementor-element-ce6f4c7" data-id="ce6f4c7"
        data-element_type="column">

        <div class=" elementor-column-wrap elementor-element-populated">

          <div class="elementor-widget-wrap row">

            <div class=" elementor-element elementor-element-ccc6233 elementor-widget elementor-widget-listeo-headline"
              data-id="ccc6233" data-element_type="widget" data-widget_type="listeo-headline.default">

              <div class="text-dark mb-md-3">
                <h3 style="text-align:center;"
                  class="pb-2 secondary_heading h2 headline  headline-aligned-to-left  headline-box "> How Jitume Works?
                </h3>
              </div>

            </div>

            <div class="elementor-element elementor-element-5df092b elementor-widget elementor-widget-listeo-iconbox"
              data-id="5df092b" data-element_type="widget" data-widget_type="listeo-iconbox.default">
              <div class="elementor-widget-container">

                <div class="icon-box-v3 row mx-auto">

                  <div class="col-sm-1"></div>

                  <div class="ibv3-icon col-sm-2 text-center">
                    <img width="75px" height="75px" src="images/randomIcons/loc.png">
                    <p class="text-center mt-3 small">Enter Your Location</p>
                  </div>


                  <div class="ibv3-icon col-sm-2 text-center">
                    <img width="75px" height="75px" src="images/randomIcons/cat.png">
                    <p class="text-center mt-3 small">Choose a Category</p>
                  </div>

                  <div class="ibv3-icon col-sm-2 text-center">
                    <img width="75px" height="75px" src="images/randomIcons/results.png">
                    <p class="text-center mt-3 small">Get Results in Your Yocation</p>
                  </div>

                  <div class="ibv3-icon col-sm-2 text-center">
                    <img width="75px" height="75px" src="images/randomIcons/choose.png">
                    <p class="text-center mt-3 small">Choose Your Business</p>
                  </div>

                  <div class="ibv3-icon col-sm-2 text-center">
                    <img width="75px" height="75px" src="images/randomIcons/grow.png">
                    <p class="text-center mt-3 small">Grow Your Business Together</p>
                  </div>

                  <div class="col-sm-1"></div>

                </div>

              </div>
            </div>


          </div>

        </div>


      </div>


      <!-- <div class="row w-75 mx-auto my-5  pl-md-5">
        <div class="text-dark mb-md-3">
          <h2 style="text-align:center;" class="secondary_heading h2 headline  headline-aligned-to-left  headline-box pb-2">
            The Show </h2>
        </div>
        <video poster="images/video_preview.png" style="" class="video_player elementor-video" src="videos/Jitume.mp4"
          controls="" controlslist="nodownload"></video>
      </div> -->

    </div>
    <!-- How it works -->



    <div class="py-5 d-md-flex  border-bottom-dark"></div>
    <div class="py-5 d-md-flex  border border-bottom-dark"></div>


  </div>
</template>


<script>
import { Hooper, Slide, Navigation as HooperNavigation } from 'hooper';
import 'hooper/dist/hooper.css';
export default {
  components: {
    Hooper,
    Slide,
    HooperNavigation
  },
  props: ['auth_user', 'business'],
  data: () => ({
    //Hooper
    hooperSettings: {
      itemsToShow: 1,
      centerMode: false,
      breakpoints: {
        800: {
          centerMode: false,
          itemsToShow: 2
        },
        1000: {
          itemsToShow: 4,
          pagination: 'fraction'
        }
      }
    },
    //Hooper
    results: [],
    form: new Form({
      listing_name: '',
      search: '',
      categories: '',

    }),
    checkListing: '',
    serviceDetails: '',
    milestone: '',
    service_milestone:'',
    commit: '',
    projectManagers:''

  }),


  created() {
    //console.log(this.auth_user);
    this.checkListing = sessionStorage.getItem('invest');
    if (this.checkListing != null)
      this.$router.push(`listingDetails/${this.checkListing}`)

    this.serviceDetails = sessionStorage.getItem('serviceDetails');
    if (this.serviceDetails != null)
      this.$router.push(`serviceDetails/${this.serviceDetails}`)

    this.milestone = sessionStorage.getItem('milestone');
    this.milestoneS = sessionStorage.getItem('milestoneS');
    this.projectManagers = sessionStorage.getItem('projectManagers');
    if (this.milestone != null)
      this.$router.push(`business-milestone/${this.milestone}`);

     if (this.projectManagers != null || this.projectManagers)
      this.$router.push(`projectManagers/${this.projectManagers}`);

    else if (this.milestoneS != null)
      this.$router.push(`service-milestone/${this.milestoneS}`);


    //CALL ACTION
    $('#call_to').html('');
    $('#call_to').html('<a onclick="c_to_action();" data-target="#loginModal" data-toggle="modal" style="color:black;" class="header_buttons px-sm-3 my-1 px-1 py-1 mx-1 d-inline-block small text-center" ><span id="c_to_ac">Add Your Business</span></a> ');
  },


  methods: {

    async search() {
      const response = await this.form.post('search');
      console.log(response.data);
      toastr.success(response.data.success, { timeout: 5000 });
      //this.$router.push('/manage-category');
      //this.$router.push({name: 'listingSearch', params: { id: 1 }})

    },

    search() {
      const form = $('#form');
      var thiss = this;
      var ids = '';
      var lat = $('#lat').val();
      var lng = $('#lng').val();

      $.ajax({
        url: 'search',
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        dataType: 'json',
        data: form.serialize(),
        success: function (response) {
          //console.log(response);

          Object.entries(response.results).forEach(entry => {
            const [index, row] = entry;
            ids = ids + row.id + ',';
          }); //console.log(ids);

          if (!ids) ids = 0;

          //thiss.$router.push({ path: '/listingResults', query: { result: response } })

          sessionStorage.setItem('queryLat',lat);
          sessionStorage.setItem('queryLng',lng);
          thiss.$router.push({ name: 'listingResults', params: { results: btoa(ids),loc:response.loc } })
        },
        error: function (response) {
          //console.log(response);
        }
      });
    },

    latBusiness: function () {
      let t = this;
      axios.get('latBusiness').then((data) => {
        t.results = data.data.data;
        for (const [key, value] of Object.entries(t.results)) {                   
                    value.id = btoa(value.id);
                    value.id = btoa(value.id);
                   //console.log(value.id);
                }

        //console.log(data);
      }).catch((error) => { })
    },

    routerPush: function () {
      this.commit = sessionStorage.getItem('commit');
      if (this.commit != null)
        this.$router.push(`business-milestone/${this.commit}`);
    }

    // initAutocomplete: function(){
    //   const input = document.getElementById("pac-input");
    //   const searchBox = new google.maps.places.SearchBox(input);
    //   searchBox.addListener("places_changed", () => {
    //   const places = searchBox.getPlaces();
    //   if (places.length == 0) { return; }
    //   const bounds = new google.maps.LatLngBounds();

    //   places.forEach((place) => {
    //     if (!place.geometry || !place.geometry.location) {
    //     console.log("Returned place contains no geometry");return; }
    //      console.log(place); 
    //   const lat = document.getElementById('lat');
    //   const lng = document.getElementById('lng');
    //   //lat.value = place.geometry.viewport.mb.hi;
    //   //lng.value = place.geometry.viewport.Oa.hi;

    //   lat.value = place.geometry.location.lat();
    //   lng.value = place.geometry.location.lng();

    //    }); });
    // }

  },

  mounted() {
    this.latBusiness();
    this.routerPush();
    
    //GOOGLE VAR
  //   let initializeWhenGoogleIsAvailable = () => {
  //     if (google) { // test if google is available
  //       this.initAutocomplete(); // if it is, then initalize
  //     } else {
  //       setTimeout(initializeWhenGoogleIsAvailable, 2000) // if it isn't, wait a bit
  //      }
  //    };
  // initializeWhenGoogleIsAvailable();
   //GOOGLE VAR

    //this.initAutocomplete();
    


  }


}
</script>
