// Function to fetch user profile data (replace with your API endpoint if needed)
async function fetchUserProfile() {
    try {
      // You can replace this with an API call to fetch data from a backend
      const userData = {
        name: "John Doe",
        avatar: "https://example.com/avatar.jpg",  // Replace with the actual avatar URL
        age: 30,
        location: "New York, USA",
        bio: "Hello, I'm John! I love traveling, photography, and coding.",
        photos: [
          "https://example.com/photo1.jpg",  // Replace with actual photo URLs
          "https://example.com/photo2.jpg",
          "https://example.com/photo3.jpg"
        ]
      };
  
      // Update the profile with the fetched data
      document.getElementById('profile-name').textContent = userData.name;
      document.getElementById('profile-avatar').src = userData.avatar;
      document.getElementById('profile-age').textContent = userData.age;
      document.getElementById('profile-location').textContent = userData.location;
      document.getElementById('profile-bio').textContent = userData.bio;
  
      // Dynamically insert photos
      const photoContainer = document.getElementById('profile-photos');
      userData.photos.forEach(photoUrl => {
        const img = document.createElement('img');
        img.src = photoUrl;
        img.alt = "Profile Photo";
        img.classList.add('profile-photo');
        photoContainer.appendChild(img);
      });
    } catch (error) {
      console.error("Error fetching user profile:", error);
    }
  }
  
  // Call the function to load the profile data
  fetchUserProfile();
  