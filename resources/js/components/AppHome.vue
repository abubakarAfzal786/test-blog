<template>
  <div>
    <v-parallax
      dark
      src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
    >
      <v-layout column align-center justify-center>
        <h1 class="white--text">Vuetify.js</h1>
        <h4 class="white--text">Build your application today!</h4>
      </v-layout>
    </v-parallax>

    <v-container grid-list-md text-xs-center>
      <h1 class="display-2 font-black-thin mb-4">Catagories</h1>
      <v-layout row-wrap>
        <v-flex
          xs4
          data-aos="fadeInLeft"
          data-aos-delay="100"
          data-aos-duration="1000"
          data-aos-once="true"
        >
          <img
            :src="'/images/laravel.png'"
            class="img-round"
            height="150px"
            width="150px"
          />
          <h3>Laravel</h3>
        </v-flex>

        <v-flex
          xs4
          data-aos="fadeInLeft"
          data-aos-delay="100"
          data-aos-duration="1000"
          data-aos-once="true"
        >
          <img
            :src="'/images/nodejs.png'"
            class="img-round"
            height="150px"
            width="150px"
          />
          <h3>Node js</h3>
        </v-flex>

        <v-flex
          xs4
          data-aos="fadeInLeft"
          data-aos-delay="100"
          data-aos-duration="1000"
          data-aos-once="true"
        >
          <img
            :src="'/images/react.png'"
            class="img-round"
            height="150px"
            width="200px"
          />
          <h3>React Js</h3>
        </v-flex>
      </v-layout>
    </v-container>

    <v-layout>
      <v-flex xs12 sm6 md5 class="left-grid">
        <v-row style="display: flex" text-xs-center>
          <v-flex xs6 text-xs-left>
            <h4 class="white--text">Lorem Ipsum</h4>
            <p class="white--text">
              Dolor sit amet consectetur adipisicing elit. Minus, aliquam
              officia tempore mollitia labore explicabo eligendi natus maxime.
              Sed ab delectus, harum impedit laboriosam velit. Molestiae sit
              aliquid reprehenderit atque.
            </p>
          </v-flex>
          <v-flex xs6 text-xs-right>
            <img :src="'/images/nodejs.png'" height="150px" width="150px" />
          </v-flex>
        </v-row>
      </v-flex>
    </v-layout>

    <transition
      enter-active-class="animated bounceInRight"
      leave-active-class="animated bounceInRight"
    >
      <v-layout justify-end dark>
        <v-flex xs12 sm6 md5 class="right-grid">
          <v-row style="display: flex" text-xs-center>
            <v-flex xs6 text-xs-left>
              <h4 class="white--text">Lorem Ipsum</h4>
              <p class="white--text">
                dolor sit amet consectetur adipisicing elit. Ipsam optio
                repellendus enim laudantium dignissimos earum quaerat temporibus
                ea nihil! Sint iusto excepturi a delectus aliquam veritatis eius
                sit natus magni? dignissimos earum quaerat temporibus ea nih
              </p>
            </v-flex>
            <v-flex xs6 text-xs-right>
              <img
                :src="'/images/react.png'"
                class="img"
                height="170px"
                width="100%"
              />
            </v-flex>
          </v-row>
        </v-flex>
      </v-layout>
    </transition>
  </div>
</template>


<script>
export default {
  data() {
    return {
      show: false,
    };
  },
};
</script>
<style  scoped>
.img-round {
  cursor: pointer;
  transition: 350ms;
}
.left-grid {
  /* background-color: antiquewhite; */
  background-image: url("/images/background.jpg");
  background-size: cover;
  height: 180px;
  padding: 20px;
  border-radius: 30px;
  margin-left: 10px;
  box-shadow: 15px 0 15px rgba(0, 0, 0, 0.5);
}

.right-grid {
  background-image: url("/images/background.jpg");
  background-size: cover;

  height: 180px;
  padding-bottom: 10px;
  padding-top: 20px;
  padding-left: 10px;
  border-radius: 30px;
  margin-right: 10px;
  box-shadow: -15px 0px 15px rgba(0, 0, 0, 0.5);
}

.img-round:hover {
  transform: scale(1.2);
  /* box-shadow:40px 10px 20px rgba(0,0,0,.5); */
}
@media (max-width: 1300px) {
  p {
    font-size: 10px;
  }
  .img-round {
    width: 100px;
    height: 100px;
  }
}
</style>