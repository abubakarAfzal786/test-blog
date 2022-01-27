<template>
  <div>
    <v-layout>
      <v-flex xs12 sm6 offset-sm3 style="margin: 30px">
        <v-card>
          <v-card-media :src="questions.image" height="200px"> </v-card-media>
          <v-card-title primary-title>
            <div>
              <router-link :to="questions.path" v-if="log()">
                <h3 class="headline mb-0">{{ questions.title }}</h3>
              </router-link>

              <div>{{ questions.description }}</div>
            </div>
          </v-card-title>
          <v-card-actions v-if="me()">
            <v-btn icon small>
              <v-icon color="blue" @click="editQ">edit</v-icon>
            </v-btn>
            <v-btn icon small>
              <v-icon color="red" @click="deleteQ">delete</v-icon>
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-flex>
    </v-layout>
    <app-edit-question v-if="edit" :question="questions"></app-edit-question>
  </div>
</template>
<script>
import AppEditQuestion from "./AddEditQuestion";
import AppAddReply from "../Reply/AppAddReply";
export default {
  props: ["questions"],
  components: {
    AppAddReply: AppAddReply,
    AppEditQuestion: AppEditQuestion,
  },
  data() {
    return {
      edit: false,
    };
  },
  methods: {
    me() {
      return User.id() == this.questions.user_id ? true : false;
    },
    editQ() {
      return (this.edit = true);
    },
    deleteQ() {
      axios.delete(`/api/posts/${this.questions.slug}`).then((response) => {
        location.reload();
      });
    },
    log() {
      return User.loggedin();
    },
  },
  created() {
    console.log(this.questions.path);
  },
};
</script>
<style>
</style>