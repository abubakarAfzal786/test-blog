
<template>
  <div class="main">
    <div class="container-fluid h-100">
      <div class="row justify-content-center h-100">
        <div class="col-md-12 col-xl-3 chat">
          <div class="card mb-sm-3 mb-md-0 contacts_card">
            <div class="card-header">
              <div class="input-group">
                <input
                  type="text"
                  placeholder="Search..."
                  name=""
                  class="form-control search"
                />
                <div class="input-group-prepend">
                  <span class="input-group-text search_btn"
                    ><i class="fas fa-search"></i
                  ></span>
                </div>
              </div>
            </div>
            <div class="card-body contacts_body">
              <ui class="contacts">
                <user v-for="user in users" :key="user.id" :user="user"></user>
              </ui>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>
        <div class="col-md-8 col-xl-6 chat">
          <chatroom />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import AppChatUser from "./AppChatUser";
import AppChatRoom from "./AppChatRoom";
export default {
  components: {
    chatroom: AppChatRoom,
    user: AppChatUser,
  },
  data() {
    return {
      users: [],
    };
  },
  created() {
    axios
      .get(`api/friends/${User.id()}`)
      .then((response) => (this.users = response.data));
  },
};
</script>
<style>
.main {
  height: 100%;
  margin: 0;
  background: #7f7fd5;
  background: -webkit-linear-gradient(to right, #91eae4, #86a8e7, #7f7fd5);
  background: linear-gradient(to right, #91eae4, #86a8e7, #7f7fd5);
}

.chat {
  margin-top: auto;
  margin-bottom: auto;
}
.card {
  height: 500px;
  border-radius: 15px !important;
  background-color: rgba(0, 0, 0, 0.4) !important;
}
.contacts_body {
  padding: 0.75rem 0 !important;
  overflow-y: auto;
  white-space: nowrap;
}
.contacts_body::-webkit-scrollbar-track {
  border: 1px solid #000;
  padding: 2px 0;
  background-color: #404040;
}

.contacts_body::-webkit-scrollbar {
  width: 10px;
}

.contacts_body::-webkit-scrollbar-thumb {
  border-radius: 10px;
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  background-color: #737272;
  border: 1px solid #000;
}
.msg_card_body {
  overflow-y: auto;
}
.msg_card_body::-webkit-scrollbar-track {
  border: 1px solid #000;
  padding: 2px 0;
  background-color: #404040;
}

.msg_card_body::-webkit-scrollbar {
  width: 10px;
}

.msg_card_body::-webkit-scrollbar-thumb {
  border-radius: 10px;
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  background-color: #737272;
  border: 1px solid #000;
}
.card-header {
  border-radius: 15px 15px 0 0 !important;
  border-bottom: 0 !important;
}
.card-footer {
  border-radius: 0 0 15px 15px !important;
  border-top: 0 !important;
}
.container {
  align-content: center;
}
.search {
  border-radius: 15px 0 0 15px !important;
  background-color: rgba(0, 0, 0, 0.3) !important;
  border: 0 !important;
  color: white !important;
}
.search:focus {
  box-shadow: none !important;
  outline: 0px !important;
}
.type_msg {
  background-color: rgba(0, 0, 0, 0.3) !important;
  border: 0 !important;
  color: white !important;
  height: 60px !important;
  overflow-y: auto;
}
.type_msg:focus {
  box-shadow: none !important;
  outline: 0px !important;
}
.attach_btn {
  border-radius: 15px 0 0 15px !important;
  background-color: rgba(0, 0, 0, 0.3) !important;
  border: 0 !important;
  color: white !important;
  cursor: pointer;
}
.send_btn {
  border-radius: 0 15px 15px 0 !important;
  background-color: rgba(0, 0, 0, 0.3) !important;
  border: 0 !important;
  color: white !important;
  cursor: pointer;
}
.search_btn {
  border-radius: 0 15px 15px 0 !important;
  background-color: rgba(0, 0, 0, 0.3) !important;
  border: 0 !important;
  color: white !important;
  cursor: pointer;
}
.contacts {
  list-style: none;
  padding: 0;
}
.contacts li {
  width: 100% !important;
  padding: 5px 10px;
  margin-bottom: 15px !important;
}
.active {
  background-color: rgba(0, 0, 0, 0.3);
}
.user_img {
  height: 70px;
  width: 70px;
  border: 1.5px solid #f5f6fa;
}
.user_img_msg {
  height: 40px;
  width: 40px;
  border: 1.5px solid #f5f6fa;
}
.img_cont {
  position: relative;
  height: 70px;
  width: 70px;
  flex: unset !important;
}
.d-flex {
  flex: unset !important;
}
.img_cont_msg {
  height: 40px;
  width: 40px;
  flex: unset !important;
}
.online_icon {
  position: absolute;
  height: 15px;
  width: 15px;
  background-color: #4cd137;
  border-radius: 50%;
  bottom: 0.2em;
  right: 0.4em;
  border: 1.5px solid white;
}
.offline {
  background-color: #c23616 !important;
}
.user_info {
  margin-top: auto;
  margin-bottom: auto;
  margin-left: 15px;
  cursor: pointer;
}
.user_info span {
  font-size: 20px;
  color: white;
}
.user_info p {
  font-size: 10px;
  color: rgba(255, 255, 255, 0.6);
}
.video_cam {
  margin-left: 50px;
  margin-top: 5px;
}
.video_cam span {
  color: white;
  font-size: 20px;
  cursor: pointer;
  margin-right: 20px;
}
.msg_cotainer {
  margin-top: auto;
  margin-bottom: auto;
  margin-left: 10px;
  border-radius: 25px;
  background-color: #82ccdd;
  padding: 10px;
  position: relative;
  flex: unset !important;
}
.msg_cotainer_send {
  margin-top: auto;
  margin-bottom: auto;
  margin-right: 10px;
  border-radius: 25px;
  background-color: #78e08f;
  padding: 10px;
  position: relative;
  flex: unset !important;
}
.msg_time {
  position: absolute;
  left: 0;
  bottom: -15px;
  color: rgba(255, 255, 255, 0.5);
  font-size: 10px;
}
.msg_time_send {
  position: absolute;
  right: 0;
  bottom: -15px;
  color: rgba(255, 255, 255, 0.5);
  font-size: 10px;
}
.msg_head {
  position: relative;
}
#action_menu_btn {
  position: absolute;
  right: 10px;
  top: 10px;
  color: white;
  cursor: pointer;
  font-size: 20px;
}
.action_menu {
  z-index: 1;
  position: absolute;
  padding: 15px 0;
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border-radius: 15px;
  top: 30px;
  right: 15px;
  display: none;
}
.action_menu ul {
  list-style: none;
  padding: 0;
  margin: 0;
}
.action_menu ul li {
  width: 100%;
  padding: 10px 15px;
  margin-bottom: 5px;
}
.action_menu ul li i {
  padding-right: 10px;
}
.action_menu ul li:hover {
  cursor: pointer;
  background-color: rgba(0, 0, 0, 0.2);
}
@media (max-width: 576px) {
  .contacts_card {
    margin-bottom: 15px !important;
  }
}
</style>