var vCar1; 
function VerticalCarousel(list, duration) {
    this.resetC = false;
	var self=this;
	self.init(list,duration);
}

VerticalCarousel.prototype.init = function(list, duration) {
	var self = this;
	self.cont = "";
	self.cont = list;
	self.store = list.html();
    self.height = self.cont.parent().height();	
	// Check if there is enough content
    if(self.cont.height() > self.height) {
        self.timer = null;
        self.duration = duration;
        self.index = 0;
        // Clone items for infinite scrolling
        self.cont.children().clone().appendTo(self.cont);
        // Update Item List and Count after clone
        self.items = self.cont.children();
        self.itemCount = self.items.length;
        // Store Item Height in an array
        self.itemHeights = [];
        for(var i = 0; i < self.itemCount; i++) {
            self.itemHeights.push(self.items.eq(i).outerHeight());
        }
        self.hidePartial();
        self.startTimer();
	}
	else {
		self.items = self.cont.children();
        self.itemCount = self.items.length;        
		for(var i = 0; i < self.itemCount; i++) {
        	self.items.eq(i).addClass('visible-carousel-item');
		}
	}
}

VerticalCarousel.prototype.slide = function() {
    var self = this;
    self.cont.animate({'marginTop': '-=' + (self.itemHeights[self.index])}, 500, function() {
        if(self.index == self.itemCount / 2 || self.resetC == true) {
            self.cont.css('marginTop', 0);
            self.index = 0;
            self.hidePartial();
			self.resetC=false;
        }
        self.startTimer();
    });
    self.index++;
    self.hidePartial();
};

VerticalCarousel.prototype.hidePartial = function() {
    var self = this;
    var totalHeight = 0;
    for(var i = 0; i < self.itemCount * 2; i++) {
        self.items.eq(i).removeClass('visible-carousel-item');
        if(i < self.index) { 
            self.items.eq(i).addClass('visible-carousel-item');
        } else {
            totalHeight += self.itemHeights[i];
            if(totalHeight < self.height) {
                self.items.eq(i).addClass('visible-carousel-item');
            }
        } 
    }
};

VerticalCarousel.prototype.startTimer = function() {
    var self = this;
    self.timer = setTimeout(function() {
        self.slide();
    }, self.duration);
};

VerticalCarousel.prototype.clearTimer = function() {
    var self = this;
    clearTimeout(self.timer);
};

VerticalCarousel.prototype.resetF = function() {
    var self = this;
    self.resetC=true;
};

VerticalCarousel.prototype.getStore = function() {
	var self = this;
	return self.store;
}

VerticalCarousel.prototype.resetSlide = function() {
	var self = this;
	if(self.cont.height() > self.height) {
		self.cont.animate({'marginTop': '-=' + (self.itemHeights[self.index])}, 500, function() {
			if(true) {
				self.cont.css('marginTop', 0);
				self.index = 0;
				self.hidePartial();
				self.resetC=false;
			}
		});
	}
}

$(window).load(function() {
    vCar1 = new VerticalCarousel($('.v-carousel-mask1 ul'), 7000);
});
