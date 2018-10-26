<template>
  <!-- <a class="btn btn-primary btn-go" @click="submit(postId)">Like</a> -->
    <a v-if="!liked" class="btn btn-primary btn-go" @click="submit(reviewId)">参考になった {{ likeCount }}</a>
    <a v-else        class="btn btn-primary btn-go" @click="unlike(reviewId)">参考になった {{ likeCount }}</a>
</template>

<script>
// Vue.prototype.$http = axios;
export default {
  props: ['reviewId'],

  data() {
    return {
      url: [],
      liked: false,
      likeCount: 0
    };
  },
  created () {
    this.getLikeCount(this.reviewId)
  },
  mounted: function () {    
  },

  methods: {
    submit(reviewId) {
      let url = `/review/${reviewId}/like`

      axios.post(url)
        .then(response => {
          this.liked = response.data.liked
          this.likeCount = response.data.likeCount
        })
        .catch(error => {
          alert('likefail');
        });
    },
    unlike(reviewId) {
      let url = `/review/${reviewId}/unlike`

      axios.post(url)
        .then(response => {
          this.liked = response.data.liked
          this.likeCount = response.data.likeCount
        })
        .catch(error => {
          alert('fail');
        });
    },
    getLikeCount(reviewId) {
      let url = `/review/${reviewId}/count`

      axios.post(url)
        .then(response => {

          this.likeCount = response.data.likeCount
          this.liked = response.data.liked
        })
        .catch(error => {
          alert('fail');
        });
    },
  }

};
</script>