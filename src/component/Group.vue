<template>
  <header class="header-container">
    <!-- Left: Browse Categories Button -->
    <div class="left-section">
      <button class="browse-btn">
        <span class="icon">▦</span>
        Browse All Categories
        <span class="arrow">▾</span>
      </button>

      <!-- Navigation Links -->
      <nav class="nav-links">
        <a href="#">🔥 Hot Deals</a>
        <a href="#">Home</a>

        <!-- Dropdown -->
        <div class="dropdown">
          <button>Food ▾</button>
          <div class="dropdown-menu">
            <a href="#">Fast Food</a>
            <a href="#">Snacks</a>
            <a href="#">Rice</a>
          </div>
        </div>

        <div class="dropdown">
          <button>Vegetables ▾</button>
          <div class="dropdown-menu">
            <a href="#">Leafy</a>
            <a href="#">Root</a>
            <a href="#">Local</a>
          </div>
        </div>

        <a href="#">Drink</a>
        <a href="#">Cookies</a>

        <div class="dropdown">
          <button>Meat & Seafood ▾</button>
          <div class="dropdown-menu">
            <a href="#">Fresh Meat</a>
            <a href="#">Seafood</a>
            <a href="#">Frozen</a>
          </div>
        </div>

        <a href="#">Bakery</a>
      </nav>
    </div>

    <!-- Right: Support Center -->
    <div class="support">
      <span class="headset">🎧</span>
      <div class="support-info">
        <strong class="phone-number">099 777 888</strong>
        <small style="padding: 24px;">24/7 Support Center</small>
      </div>
    </div>
  </header>
</template>

<script lang="ts">
export default {
  name: "HeaderBar",
};
</script>

<style scoped>
.header-container {
  width: 80%;
  padding: 12px 20px;
  background: #fff;
  display: flex;
  justify-content: center;
  gap: 80px;
  align-items: center;
  box-shadow: 0 2px 6px rgba(0,0,0,0.08);
  font-family: Arial, sans-serif;
  margin-left: 100px;
}

/* Left Section */
.left-section {
  display: flex;
  align-items: center;
  gap: 20px;
}

/* Browse Button */
.browse-btn {
  background: #2ecc71;
  color: white;
  padding: 10px 18px;
  border-radius: 8px;
  font-size: 15px;
  display: flex;
  align-items: center;
  border: none;
  cursor: pointer;
  gap: 8px;
}

.browse-btn .icon {
  font-size: 18px;
}

.browse-btn:hover {
  background: #27ae60;
}

/* Navigation */
.nav-links {
  display: flex;
  align-items: center;
  gap: 20px;
}

.nav-links a,
.dropdown button {
  font-size: 15px;
  text-decoration: none;
  color: #333;
  background-color: transparent;
  font-weight: 500;
  background-color: none;
  border: none;
  cursor: pointer;
}

.nav-links a:hover,
.dropdown button:hover {
  color: #27ae60;
}

/* Dropdown menu */
.dropdown {
  position: relative;
}

.dropdown-menu {
  position: absolute;
  background: white;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  border-radius: 6px;
  padding: 10px 0;
  display: none;
  top: 28px;
  width: 150px;
  z-index: 50;
}

.dropdown:hover .dropdown-menu {
  display: block;
}

.dropdown-menu a {
  display: block;
  padding: 8px 15px;
  color: #333;
}

.dropdown-menu a:hover {
  background: #f5f5f5;
}

/* Support Section */
.support {
  display: flex;
  align-items: center;
  gap: 10px;
}

.phone-number {
  color: #27ae60;
  font-size: 18px;
}

.headset {
  font-size: 22px;
}

.support-info small {
  font-size: 12px;
  color: #888;
}
</style>
