<template>
  <div>
    <v-layout :style="bcolor">
      <v-flex xs12 sm8 offset-sm2 style="margin-top: 10px; color: red">
        <v-card v-if="!editing">
          <v-card-title primary-title>
            <div>
              <h5 class="headline mb-0">{{ reply.comment }} {{ getNow() }}</h5>

              <div>
                <p>Created At: {{ reply.created_at }}</p>
                <p>Commented by: {{ reply.username }}</p>
              </div>
            </div>
          </v-card-title>
          <v-card-actions v-if="me()">
            <v-btn icon small>
              <v-icon color="blue" @click="editQ">edit</v-icon>
            </v-btn>
            <v-btn icon small>
              <v-icon color="red" @click="deletereply">delete</v-icon>
            </v-btn>
          </v-card-actions>
        </v-card>
        <app-edit-reply
          v-if="editing"
          :quest_id="quest"
          :reply="reply"
        ></app-edit-reply>
      </v-flex>
    </v-layout>

    <reply
      v-for="reply in comment"
      :key="reply.id"
      :quest="quest"
      :reply="reply"
      styling="color:red; margin-left:200px;"
    ></reply>
  </div>
</template>
<script>
import AppShowReply from "./AppShowReply";
import AppEditReply from "./AppEditReply";
export default {
  name: "reply",
  props: {
    index: {},
    quest: {},
    reply: {},
    styling: {
      type: String,
    },
  },
  components: {
    reply: AppShowReply,
    AppEditReply: AppEditReply,
  },
  data() {
    return {
      timestamp: "",
      comment: [],
      editing: false,
    };
  },
  computed: {
    bcolor() {
      return this.styling;
    },
  },
  created() {
    console.log(this.reply);
    axios
      .get(`/api/comment/${this.reply.id}`)
      .then((response) => (this.comment = response.data));
    EventBus.$on("CancelEdit", () => {
      this.editing = false;
    });
  },
  methods: {
    getNow: function () {
      const today = new Date();
      const date =
        today.getFullYear() +
        "-" +
        (today.getMonth() + 1) +
        "-" +
        today.getDate();
      const time =
        today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      const dateTime = date + " " + time;
      this.timestamp = dateTime;
    },
    editQ() {
      this.editing = true;
    },
    deletereply() {
      EventBus.$emit("DeleteReply", this.index);
    },
    me() {
      return User.id() == this.reply.user_id ? true : false;
    },
  },
};
</script>