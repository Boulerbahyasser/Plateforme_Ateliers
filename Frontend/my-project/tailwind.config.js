/** @type {import('tailwindcss').Config} */
export default {
  content: [],
  theme: {s
    extend: {},
  },
  plugins: [],
}
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
module.exports = {

  plugins: [
      require('flowbite/plugin')
  ]

}
module.exports = {

  content: [
      "./node_modules/flowbite/**/*.js"
  ]

}