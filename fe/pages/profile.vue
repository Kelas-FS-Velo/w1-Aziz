<template>
  <div class="p-4 m-8 w-80 bg-white shadow-md rounded-xl mx-auto mt-20">
    <picture class="rounded-lg block overflow-hidden relative group">
      <img
        class="w-full transition-all duration-300 group-hover:scale-125 group-hover:blur-sm"
        ref="gambar"
        src="https://picsum.photos/360/240"
      />
      <div
        class="absolute inset-0 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300"
      >
        <input
          type="file"
          @change="handleFileChange"
          class="hidden"
          id="fileUpload"
        />
        <label
          for="fileUpload"
          class="px-4 py-2 bg-transparent border border-white text-white rounded cursor-pointer mb-2 hover:bg-white/20 transition-colors"
        >
          Choose File
        </label>
        <button
          class="px-4 py-2 bg-transparent border border-white text-white rounded hover:bg-white/20 transition-colors"
          @click="kirimGambar"
        >
          Kirim
        </button>
      </div>
    </picture>

    <h1 class="text-center mt-4 mb-2 text-xl font-bold">Abdul Aziz Firdaus</h1>
    <p class="text-justify text-sm text-gray-600">
      Saya merupakan seorang web developer yang berfokus pada pengembangan
      aplikasi berbasis web. Saya memiliki pengalaman dalam pengembangan
      aplikasi berbasis web menggunakan teknologi modern seperti Vue.js,
      Nuxt.js, dan Tailwind CSS.
    </p>
    <ul class="flex justify-evenly flex-row list-none mt-3 mb-0">
      <li class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg">
        <a href="https://www.linkedin.com/in/abdulazizfirdaus">LinkedIn</a>
      </li>
      <li class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg">
        <a href="https://www.instagram.com/abdulaaziz011">Instagram</a>
      </li>
      <li class="bg-blue-500 hover:bg-blue-800 text-white px-4 py-2 rounded-lg">
        <a href="https://github.com/AzizLike29">Github</a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      gambar: null,
    };
  },
  methods: {
    handleFileChange(e) {
      this.gambar = e.target.files[0];
      this.previewGambar();
    },
    previewGambar() {
      const reader = new FileReader();
      reader.onload = (e) => {
        this.$refs.gambar.src = e.target.result;
      };
      reader.readAsDataURL(this.gambar);
    },
    kirimGambar() {
      const formData = new FormData();
      formData.append("gambar", this.gambar);
      this.$axios
        .post("http://localhost:8000/api/upload-gambar", formData)
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
