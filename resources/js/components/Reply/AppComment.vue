<template>
  <div>
    <v-layout>
      <v-flex xs12 sm8 offset-sm2 style="margin-top: 10px; color: red">
        <v-card>
          <v-card-title primary-title>
            <div>
              <h5 class="headline mb-0">{{ reply.comment }} {{ getNow() }}</h5>
              <div>
                <p>Created At: {{ reply.created_at }}</p>
                <p>Commented by: {{ reply.username }}</p>
              </div>
            </div>
          </v-card-title>
        </v-card>
      </v-flex>
    </v-layout>
  </div>
</template>
<script>
export default {
  name: "reply",
  props: ["reply"],
  components: {
    reply: AppShowReply,
  },
  data() {
    return {
      timestamp: "",
      comment: [],
    };
  },

  created() {
    axios
      .get(`/api/comment/${this.reply.id}`)
      .then((response) => (this.comment = response.data));
    setInterval(this.getNow, 1000);
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
  },
};
</script>