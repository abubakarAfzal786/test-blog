<template>
  <div>
    <v-layout row wrap>
      <v-flex xs4></v-flex>
      <v-flex xs12 sm4 md4>
        <v-card class="login">
          <v-layout row wrap>
            <v-flex md8 xs8 sm6>
              <v-btn color="success" @click="LoginShow" small> Login </v-btn>
            </v-flex>

            <v-btn color="success" class="register" @click="SignupShow" small>
              SignUp
            </v-btn>
          </v-layout>

          <v-divider></v-divider>
          <transition enter-active-class="animated flipInX">
            <v-form v-model="valid" v-if="signup" @submit.prevent="SignUp">
              <v-row>
                <v-col cols="4" md="4">
                  <v-text-field
                    type="text"
                    v-model="form.name"
                    label="Full Name"
                    required
                  ></v-text-field>
                  <span class="red--text" v-if="errors.name">{{
                    errors.name[0]
                  }}</span>
                </v-col>

                <v-col cols="4" md="4">
                  <v-text-field
                    type="email"
                    v-model="form.email"
                    label="E-mail"
                    required
                  ></v-text-field>
                  <span class="red--text" v-if="errors.email">{{
                    errors.email[0]
                  }}</span>
                </v-col>

                <v-col cols="4" md="4">
                  <v-text-field
                    type="password"
                    v-model="form.password"
                    label="Password"
                    required
                  ></v-text-field>
                  <span class="red--text" v-if="errors.password">{{
                    errors.password[0]
                  }}</span>
                </v-col>
                <v-col cols="4" md="4">
                  <v-text-field
                    type="password"
                    v-model="form.password_confirmation"
                    label="Confirm Password"
                    required
                  ></v-text-field>
                  <v-btn color="info" type="submit">Submit</v-btn>
                </v-col>
              </v-row>
            </v-form>
          </transition>
          <transition enter-active-class="animated bounceIn">
            <v-form v-if="login" @submit.prevent="Login">
              <v-row>
                <v-col cols="4" md="4">
                  <v-text-field
                    type="email"
                    v-model="form.email"
                    label="E-mail"
                    required
                  ></v-text-field>
                </v-col>

                <v-col cols="4" md="4">
                  <v-text-field
                    label="password"
                    v-model="form.password"
                    type="password"
                    required
                  ></v-text-field>
                </v-col>

                <v-btn color="info" type="submit">Submit</v-btn>
              </v-row>
            </v-form>
          </transition>
        </v-card>
      </v-flex>
    </v-layout>
  </div>
</template>
<script>
export default {
  data() {
    return {
      signup: false,
      login: true,
      detail: "",
      form: {
        email: null,
        name: null,
        password: null,
      },

      errors: {},
    };
  },
  methods: {
    SignUp() {
      axios
        .post("/api/auth/signup", this.form)
        .then((response) => User.responseAfterLogin(response.data))
        .catch((error) => (this.errors = error.response.data.errors));
    },
    Login() {
      axios
        .post("/api/auth/login", this.form)
        .then((response) => User.responseAfterLogin(response.data))
        .catch((error) => console.log(error.data));
    },
    SignupShow() {
      this.signup = true;
      this.login = false;
    },
    LoginShow: function () {
      this.signup = false;
      this.login = true;
    },
  },
};
</script>
<style scoped>
.login {
  margin: 10px;
  padding: 5px;
  box-shadow: 0px 20px 15px rgba(0, 0, 0, 0.5);
}

@media (max-width: 362px) {
  .login {
    margin: 5px;
  }
}
</style>