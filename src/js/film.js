$(document).ready(function() {
    var $dropdowns = $('li.dropdown'); 
    $dropdowns
        .on('mouseover', function()
        {
            var $this = $(this);
            if ($this.prop('hoverTimeout'))
            {
                $this.prop('hoverTimeout', clearTimeout($this.prop('hoverTimeout')));
            }
            $this.prop('hoverIntent', setTimeout(function()
            {
                $this.addClass('hover');
            }, 250));
        })
        .on('mouseleave', function()
        {
            var $this = $(this);
            if ($this.prop('hoverIntent'))
            {
                $this.prop('hoverIntent', clearTimeout($this.prop('hoverIntent')));
            }
            $this.prop('hoverTimeout', setTimeout(function()
            {
                $this.removeClass('hover');
            }, 250));
        });

    if ('ontouchstart' in document.documentElement)
    {
        $dropdowns.each(function()
        {
            var $this = $(this);

            this.addEventListener('touchstart', function(e)
            {
                if (e.touches.length === 1)
                {
                    // Prevent touch events within dropdown bubbling down to document
                    e.stopPropagation();

                    // Toggle hover
                    if (!$this.hasClass('hover'))
                    {
                        // Prevent link on first touch
                        if (e.target === this || e.target.parentNode === this)
                        {
                            e.preventDefault();
                        }

                        // Hide other open dropdowns
                        $dropdowns.removeClass('hover');
                        $this.addClass('hover');

                        // Hide dropdown on touch outside
                        document.addEventListener('touchstart', closeDropdown = function(e)
                        {
                            e.stopPropagation();

                            $this.removeClass('hover');
                            document.removeEventListener('touchstart', closeDropdown);
                        });
                    }
                }
            }, false);
        });
    }
    
});