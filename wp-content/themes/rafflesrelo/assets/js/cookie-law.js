					(function($){
						function showCookiePopup()
						{
														
							var pop = document.createElement('div');
							pop.id = "cookiepop";

							$(pop)
								.css("width", cookieLawObj.width + "px")
								.css("height", cookieLawObj.height + "px")
								.append(
									$(document.createElement('p'))
										.text(cookieLawObj.popupText)
							);
							
							$(pop).append(
								$(document.createElement('p'))
									.append(
										$(document.createElement('a'))
											.text("Close")
											.addClass("btn")
											.addClass("btn-default")
											.addClass("btn-no-width")
											.attr("href", "#")
											.click(hideCookiePopup)
									)
									.append(
										$(document.createElement('a'))
											.text("View Terms")
											.addClass("btn")
											.addClass("btn-default")
											.addClass("btn-no-width")
											.attr("href", cookieLawObj.termsPageUrl)
											.css("margin-left", "10px")
									)
							);
							
							document.body.appendChild(pop);
							
							$(pop).fadeIn('fast');
							
							var tmr = setTimeout(function(){ hideCookiePopup(); }, cookieLawObj.timeout *1000);
						}
						
						function hideCookiePopup()
						{
							$('#cookiepop').fadeOut('fast');
							return false;
						}
									
						$(document).ready(function(){
							showCookiePopup();
						});
					})(jQuery);