document.addEventListener('DOMContentLoaded', function() 
{
    // Function to initialize and update icons for a given radio button group
    function initializeRadioGroup(name) {
        var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
        
        // Attach change event listener to each radio button
        radios.forEach(function(radio) 
        {
            radio.addEventListener('change', function() 
            {
                updateIcons(radios);
            });
        });

        // Initial call to set the icons on page load
        updateIcons(radios);
    }

    // Function to update icons for a set of radio buttons
    function updateIcons(radios) 
    {
        radios.forEach(function(radio) 
        {
            var iconSpan = radio.nextElementSibling;

            if (radio.checked) 
            {
                iconSpan.classList.remove('cross');
                iconSpan.classList.add('tick');
            } 

            else
            {
                iconSpan.classList.remove('tick');
                iconSpan.classList.add('cross');
            }
        });
    }

    // List of radio button group names to initialize
    var radioGroups = [ 'A_1', 'A_2', 'A_3', 'B_1', 'B_2', 'B_3','C_1', 'C_2', 'D_1', 'D_2', 'D_3','E_1', 'E_2', 'E_3', 'E_4'];



});
