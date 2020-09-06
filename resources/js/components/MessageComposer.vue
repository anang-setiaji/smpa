<template>
  <div class="composer">
    <textarea
      v-model="message"
      @keydown.enter="send"
      placeholder="Message..."
    ></textarea>
    <label class="file-select">
      <!-- We can't use a normal button element here, as it would become the target of the label. -->
      <div class="select-button">
        <!-- Display the filename if a file has been selected. -->
        <span v-if="value">Selected File: {{ value.name }}</span>
        <span v-else>Select File</span>
      </div>
      <!-- Now, the file input that we hide. -->
      <input type="file" @change="handleFileChange" />
    </label>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: "",
    };
  },
  methods: {
    send(e) {
      e.preventDefault();
      if (this.message == "") {
        return;
      }
      this.$emit("send", this.message);
      this.message = "";
    },
    handleFileChange(e) {
    //   console.log({e});
      // Whenever the file changes, emit the 'input' event with the file data.
      const fileReader = new FileReader();
      fileReader.onload = () => {
          this.$emit("upload", {file: fileReader.result, name: e.target.files[0].name});
      }
      fileReader.readAsDataURL(e.target.files[0])
    },
  },
};
</script>

<style lang="scss" scoped>
.composer textarea {
  width: 90%;
  margin: 10px;
  resize: none;
  border-radius: 3px;
  border: 1px solid lightgray;
  padding: 6px;
}
.file-select > .select-button {
  padding: 15px;
  width: 100%;
  margin-left: 10px;
  color: white;
  background-color: #2ea169;

  border-radius: 0.3rem;

  text-align: center;
  font-weight: bold;
}

.file-select > input[type="file"] {
  display: none;
}
</style>
