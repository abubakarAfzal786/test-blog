<template>
  <li class="active">
    <div class="d-flex bd-highlight">
      <div class="img_cont">
        <img
          src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
          class="rounded-circle user_img"
        />
        <span class="online_icon"></span>
      </div>
      <div class="user_info">
        <span @click="send_data">{{ user.friend_name }}</span>
        <!-- <p>Kalid is online</p> -->
      </div>
    </div>
  </li>
</template>
<script>
export default {
  props: ["user"],
  methods: {
    send_data() {
      EventBus.$emit("user_data", this.user);
    },
  },
};
</script>