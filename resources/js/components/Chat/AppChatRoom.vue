<template>
  <div class="card">
    <div class="card-header msg_head">
      <div class="d-flex bd-highlight">
        <div class="img_cont">
          <img
            src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
            class="rounded-circle user_img"
          />
          <span class="online_icon"></span>
        </div>
        <div class="user_info" v-if="friend">
          <span>Chat with {{ friend.friend_name }}</span>
          <p>1767 Messages</p>
        </div>
        <div class="video_cam">
          <span><i class="fas fa-video"></i></span>
          <span><i class="fas fa-phone"></i></span>
        </div>
      </div>
      <span id="action_menu_btn" @click="show_menu"
        ><i class="fas fa-ellipsis-v"></i
      ></span>
      <div class="action_menu">
        <ul v-if="showmenu">
          <li><i class="fas fa-user-circle"></i> View profile</li>
          <li><i class="fas fa-users"></i> Add to close friends</li>
          <li><i class="fas fa-plus"></i> Add to group</li>
          <li><i class="fas fa-ban"></i> Block</li>
        </ul>
      </div>
    </div>
    <div class="card-body msg_card_body">
      <div v-for="chat in chats" :key="chat.id">
        <div
          class="d-flex justify-content-end mb-4"
          v-if="chat.sender_id == logged_in"
        >
          <div class="msg_cotainer_send">
            {{ chat.message }}
            <span class="msg_time_send">9:10 AM, Today</span>
          </div>
          <div class="img_cont_msg">
            <img
              src="https://2.bp.blogspot.com/-8ytYF7cfPkQ/WkPe1-rtrcI/AAAAAAAAGqU/FGfTDVgkcIwmOTtjLka51vineFBExJuSACLcBGAs/s320/31.jpg"
              class="rounded-circle user_img_msg"
            />
          </div>
        </div>
        <div class="d-flex justify-content-start mb-4" v-else>
          <div class="img_cont_msg">
            <img
              src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
              class="rounded-circle user_img_msg"
            />
          </div>
          <div class="msg_cotainer">
            {{ chat.message }}
            <span class="msg_time">9:12 AM, Today</span>
          </div>
        </div>
      </div>
    </div>

    <div class="card-footer">
      <div class="input-group">
        <div class="input-group-append">
          <span class="input-group-text attach_btn"
            ><i class="fas fa-paperclip"></i
          ></span>
        </div>
        <span v-if="typing == true">{{ name }} is typing....</span>
        <textarea
          name=""
          class="form-control type_msg"
          @keyup.enter="send_message"
          @keydown="isTyping"
          v-model="message"
          @keyup="notTyping"
          placeholder="Type your message..."
        ></textarea>
        <div class="input-group-append">
          <span class="input-group-text send_btn"
            ><i class="fas fa-location-arrow"></i
          ></span>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      showmenu: false,
      friend: null,
      logged_in: null,
      message: null,
      chats: [],
      name: null,
      typing: false,
    };
  },

  mounted() {},
  created() {
    Echo.private("chatchannel")
      .listen("ChatEvent", (e) => {
        this.chats.push(e.message);
      })
      .listenForWhisper("typing", (e) => {
        this.name = e.user;
        this.typing = e.typing;
      });

    this.logged_in = User.id();

    EventBus.$on("user_data", (data) => {
      this.friend = data;

      axios
        .post("/api/chat", { user_id: User.id(), friend_id: data.friend_id })
        .then((response) => (this.chats = response.data));
    });
  },
  methods: {
    isTyping() {
      setTimeout(function () {
        Echo.private("chatchannel").whisper("typing", {
          user: User.name(),
          typing: true,
        });
      }, 300);
    },
    notTyping() {
      setTimeout(function () {
        Echo.private("chatchannel").whisper("typing", {
          user: User.name(),
          typing: false,
        });
      }, 3000);
    },
    show_menu() {
      this.showmenu = !this.showmenu;
    },
    send_message() {
      axios
        .post("api/send_chat", {
          user_id: User.id(),
          friend_id: this.friend.friend_id,
          message: this.message,
        })
        .then((response) => {
          // this.chats.push(response.data)
          this.message = null;
        });
    },
  },
};
</script>