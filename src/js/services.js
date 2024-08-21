// Get the URL parameters
const params = new URLSearchParams(window.location.search);
const service = params.get('service');

// Define the service details
const services = {
    checkups: {
        title: 'Free Checkups',
        description: 'At ARYAcare, we provide free checkups because we believe everyone should have easy access to health care. Regular checkups can help you catch any health issues early and keep you feeling your best.'
    },
    ambulance: {
        title: '24/7 Ambulance',
        description: 'ARYAcare offers an ambulance service that is available all day and night, every day of the week. No matter when an emergency happens, our ambulance is ready to take you to the hospital quickly and safely.'
    },
    doctors: {
        title: 'Expert Doctors',
        description: 'The doctors at ARYAcare are highly skilled and have many years of experience. They are here to listen to your concerns and provide you with the best treatment possible, ensuring you get the care you deserve.'
    },
    medicines: {
        title: 'Medicines',
        description: 'ARYAcare stocks a wide range of medicines to help you recover from illness and maintain your health. Whether you need a prescription filled or over-the-counter remedies, we have the right medications for you.'
    },
    bedfacility: {
        title: 'Bed Facility',
        description: 'When you need to stay in the hospital, ARYAcare offers comfortable bed facilities to ensure your stay is as pleasant as possible. Our rooms are clean and well-equipped to meet all your needs during your recovery.'
    },
    totalcare: {
        title: 'Total Care',
        description: 'At ARYAcare, we believe in taking care of the whole person. Our total care services are designed to look after every aspect of your health, from routine checkups to specialized treatments, ensuring you always receive comprehensive care.'
    }
};

// Display the selected service content
if (services[service]) {
    document.getElementById('service-content').innerHTML = `
        <h3>${services[service].title}</h3>
        <p>${services[service].description}</p>
    `;
}
