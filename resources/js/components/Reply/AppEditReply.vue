<template>
  <div>
    <v-card>
      <v-card-title primary-title>
        <markdown-editor
          v-model="reply.comment"
          style="width: -webkit-fill-available"
        ></markdown-editor>
      </v-card-title>
      <v-card-actions>
        <v-btn icon small>
          <v-icon color="green" @click="save">save</v-icon>
        </v-btn>

        <v-btn icon small>
          <v-icon color="black" @click="cancel()">cancel</v-icon>
        </v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>
<script>
export default {
  props: ["reply", "quest_id"],
  data() {
    return {};
  },
  methods: {
    cancel() {
      EventBus.$emit("CancelEdit");
    },
    save() {
      axios.patch(`/api/post/${this.quest_id}/reply/${this.reply.id}`, {
        body: this.reply.comment,
      });
      EventBus.$emit("CancelEdit");
    },
  },
};
</script>