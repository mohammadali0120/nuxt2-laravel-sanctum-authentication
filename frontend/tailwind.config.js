module.exports = {
    darkMode: "class",
    content: [
      "./assets/**/*.{vue,js,css}",
      "./components/**/*.{vue,js}",
      "./layouts/**/*.vue",
      "./pages/**/*.vue",
      "./plugins/**/*.{js,ts}",
      "./nuxt.config.{js,ts}",
    ],
    theme: {
      extend: {
        container: {
          center: true,
        },
      },
    },
    variants: {
      extend: {},
    },
    plugins: [],
  };
  