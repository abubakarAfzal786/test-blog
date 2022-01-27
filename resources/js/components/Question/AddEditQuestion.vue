<template>
  <div>
    <v-form @submit.prevent="uploadartical">
      <v-container grid-list-md>
        <v-layout row wrap>
          <v-flex xs12>
            <v-text-field
              v-model="form.title"
              label="Title"
              required
            ></v-text-field>
          </v-flex>

          <v-flex xs6>
            <vue-croppie
              ref="croppieRef"
              :enableOrientation="true"
              :boundary="{ width: 300, height: 300 }"
              @result="result"
              @update="update"
            >
            </vue-croppie>
          </v-flex>
          <!-- the result -->
          <v-flex xs6>
            <img v-bind:src="cropped" />
          </v-flex>

          <!-- <v-btn color="success" @click="fileToUpload">Upload File</v-btn>
        <input type="file" style="display:none" ref="fileInput" accept="image/*" @change="FilePicked"> -->

          <v-flex xs12>
            <v-btn color="success" @click="fileToUpload" v-if="!imageUrl"
              >Upload File</v-btn
            >
            <v-btn color="success" @click="fileToUpload" v-else
              >Upload a New File</v-btn
            >

            <input
              type="file"
              style="display: none"
              ref="fileInput"
              accept="image/*"
              @change="FilePicked"
            />
          </v-flex>
          <v-flex xs12 v-if="imageUrl">
            <v-btn @click="rotate(-90)">Rotate Left</v-btn>
            <v-btn @click="rotate(90)">Rotate Right</v-btn>
            <v-btn @click="crop()">Crop</v-btn>
            <v-btn @click="cropViaEvent()">Crop with Round Frame</v-btn>
          </v-flex>
          <v-flex xs12> </v-flex>
          <v-flex xs12>
            <markdown-editor v-model="form.description"></markdown-editor>
            <v-btn type="submit" color="success">Post</v-btn>
          </v-flex>
        </v-layout>
      </v-container>
    </v-form>
  </div>
</template>
<script>
export default {
  props: ["question"],
  data() {
    return {
      cropped: null,
      content: "",
      imageUrl: null,
      form: {
        title: this.question.title,
        description: this.question.description,
        image: null,
      },
    };
  },
  methods: {
    uploadartical() {
      this.$Progress.start();
      axios
        .patch(`/api/posts/${this.question.slug}`, this.form)
        .then((response) => {
          this.$Progress.finish();
          location.reload();
        })

        .catch((error) => {
          this.$Progress.fail();
          console.log(error);
        });
    },
    changeUrl() {
      this.imageUrl = null;
      this.$refs.croppieRef.bind({
        url: "http://i.imgur.com/fHNtPXX.jpg",
      });
    },
    fileToUpload() {
      this.$refs.fileInput.click();
    },
    FilePicked(event) {
      const files = event.target.files;

      let filename = files[0].name;
      let fileex = filename.split(".");

      if ((fileex[1] = !"jpg" && fileex[1] != "jpeg" && fileex[1] != "png")) {
        return alert("Please Select a Vaild File Name");
      }
      const fileRead = new FileReader();
      fileRead.readAsDataURL(files[0]);
      fileRead.addEventListener("load", () => {
        this.imageUrl = fileRead.result;
        this.$refs.croppieRef.bind({ url: this.imageUrl });
      });
    },

    // CALBACK USAGE
    crop() {
      // Here we are getting the result via callback function
      // and set the result to this.cropped which is being
      // used to display the result above.
      let options = {
        format: "jpeg",
        circle: false,
      };
      this.$refs.croppieRef.result(options, (output) => {
        this.cropped = output;
        this.form.image = output;
      });
    },
    // EVENT USAGE
    cropViaEvent() {
      let options = {
        format: "jpeg",
        circle: true,
      };
      this.$refs.croppieRef.result(options, (output) => {
        this.cropped = output;
        this.form.image = output;
      });
    },
    result(output) {
      this.cropped = output;
      this.form.image = output;
    },
    update(val) {
      console.log(val);
    },
    rotate(rotationAngle) {
      // Rotates the image
      this.$refs.croppieRef.rotate(rotationAngle);
    },
  },
};
</script>
<style scoped>
</style>