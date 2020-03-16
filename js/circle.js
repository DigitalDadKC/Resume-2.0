function Circle(el){
  $(el).circleProgress({fill: {color: '#4472c4'}})
    .on('circle-animation-progress', function(event, progress, stepValue){
					$(this).find('strong').text(String(stepValue.toFixed(2)).substr(2)+'%');
			});
};
Circle('.round');
