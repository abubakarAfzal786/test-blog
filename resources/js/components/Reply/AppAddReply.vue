<template>
  <div>
    <v-flex xs12 offset-sm4 style="margin: 30px">
      <markdown-editor v-model="comment"></markdown-editor>
      <v-btn small dark color="green" @click="Reply()"> Reply </v-btn>
    </v-flex>
  </div>
</template>
<script>
import AppShowReply from "./AppShowReply";
export default {
  props: ["quest"],
  data() {
    return {
      comment: null,
    };
  },
  methods: {
    Reply() {
      axios
        .post(`/api/post/${this.quest}/reply`, { comment: this.comment })
        .then((response) => {
          EventBus.$emit("AddNewReply", response.data);
          //   this.comment = null;
        });
    },
  },
};
</script>