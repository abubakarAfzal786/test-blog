<template>
  <div>
    <v-layout>
      <v-flex xs12 sm5 offset-sm3 style="margin-top: 20px">
        <v-card>
          <!-- <v-card-media :src="quest.image" height="200px"> </v-card-media> -->
          <v-card-title primary-title>
            <div>
              <h3 class="headline mb-0">{{ quest.title }}</h3>

              <div>{{ quest.description }}</div>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
    </v-layout>
    <div v-for="(repli, index) in this.reply" :key="index">
      <div v-if="repli.child_id == 0">
        <app-show-reply
          :reply="repli"
          :quest="quest.id"
          :index="index"
        ></app-show-reply>
      </div>
    </div>
  </div>
</template>
<script>
import AppShowReply from "../Reply/AppShowReply";
import AppReply from "../Reply/AppReply";
export default {
  props: ["quest"],
  components: {
    AppShowReply: AppShowReply,
    AppReply: AppReply,
  },
  data() {
    return {
      reply: this.quest.reply,
    };
  },
  created() {
    EventBus.$on("DeleteReply", (index) => {
      axios
        .delete(`/api/post/${this.quest.id}/reply/${this.reply[index].id}`)
        .then((response) => {
          this.reply.splice(index);
        });
    });
    EventBus.$on("AddNewReply", (Reply) => {
      this.reply.push(Reply);
      console.log(this.reply);
      window.scrollTo({
        top: 4,
        bottom: 4,
        behavior: "smooth",
      });
    });
  },
  methods: {
    me() {
      return User.id() == this.quest.user_id ? true : false;
    },
  },
};
</script>