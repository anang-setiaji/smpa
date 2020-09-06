<template>
  <div class="feed" ref="feed">
    <ul v-if="contact">
      <li
        v-for="message in messages"
        :class="`message${message.to == contact.id ? ' sent' : ' received'}`"
        :key="message.id"
      >
        <div class="text">
          <div v-if="message.filename === null">
            {{ message.text }}
          </div>
          <div v-if="message.filename !== ''">
          <div v-if="message.image !== null">
            <div v-if="message.image.indexOf('image/jpeg') !== -1 || message.image.indexOf('image/png') !== -1">
            <img @click="showImage($event, message.image, message.filename)" :src="message.image" />
            </div>
            <div v-else>
              <a href="#" @click="downloadFile($event, message.image, message.filename)">{{message.filename}}</a>
                </div>
            </div>
          </div>
        </div>
      </li>
      <!-- <div class="image">
                <img style="max-width:100px":src="'/uploads/' + message.image" />
                </div> -->
    </ul>
  </div>
</template>

<script>
import FileSaver from "file-saver";

export default {
  props: {
    contact: {
      type: Object,
    },
    messages: {
      type: Array,
      required: true,
    },
  },
  methods: {
    scrollToBottom() {
      setTimeout(() => {
        this.$refs.feed.scrollTop =
          this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
      }, 50);
    },
    downloadFile(e, file, name) {
      e.preventDefault();
      FileSaver.saveAs(file, name);
    },
    showImage(e, file, name) {
      $('#popupImg').show();
      $('#popupImg img').attr('src', file)
    }
  },
  watch: {
    contact(contact) {
      this.scrollToBottom();
    },
    messages(messages) {
      this.scrollToBottom();
    },
  },
};
</script>

<style lang="scss" scoped>
img{
  width:150px
}
.feed {
  background: #f0f0f0;
  height: 100%;
  max-height: 470px;
  overflow: scroll;
  ul {
    list-style-type: none;
    padding: 5px;
    li {
      &.message {
        margin: 10px 0;
        width: 100%;
        .text {
          max-width: 200px;
          border-radius: 5px;
          padding: 10px;
          display: inline-block;
        }
        &.sent {
          text-align: right;
          .text {
            background: #81c4f9;
          }
        }
        &.received {
          text-align: left;
          .text {
            background: #b2b2b2;
          }
        }
      }
    }
  }
}
</style>
