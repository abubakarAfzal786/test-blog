<template>
  <transition enter-active-class="animated fadeInRight" appear>
    <div>
      <v-layout row wrap>
        <v-flex xs4></v-flex>
        <v-flex xs12 sm4 md4>
          <v-card class="login">
            <v-layout row wrap>
              <v-flex md8 xs8 sm6>
                <router-link to="/login">
                  <v-btn color="success" small> Login </v-btn>
                </router-link>
              </v-flex>

              <v-btn color="success" class="register" small> SignUp </v-btn>
            </v-layout>

            <v-divider></v-divider>

            <v-form v-model="valid">
              <v-row>
                <v-col cols="4" md="4">
                  <v-text-field
                    v-model="firstname"
                    :rules="nameRules"
                    :counter="10"
                    label="First name"
                    required
                  ></v-text-field>
                </v-col>

                <v-col cols="4" md="4">
                  <v-text-field
                    v-model="lastname"
                    :rules="nameRules"
                    :counter="10"
                    label="Last name"
                    required
                  ></v-text-field>
                </v-col>

                <v-col cols="4" md="4">
                  <v-text-field
                    v-model="email"
                    :rules="emailRules"
                    label="E-mail"
                    required
                  ></v-text-field>
                  <v-btn color="info">Submit</v-btn>
                </v-col>
              </v-row>
            </v-form>
          </v-card>
        </v-flex>
      </v-layout>
    </div>
  </transition>
</template>
<script>
export default {};
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