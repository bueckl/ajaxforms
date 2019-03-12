<div class="row">
	<div class="col-md-8 col-md-offset-2">

		<form $FormAttributes role="form">
			<% if Message %>
				<p id="{$FormName}_error" class="message $MessageType">$Message</p>
			<% else %>
				<p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
			<% end_if %>
	
			<fieldset>

				<% with $FieldMap %>

				<div class="desc">
					<h2><small>Verfügbarkeitsanfrage</small><br />$Title</h2>
					<p>Fragen Sie hier schnell und unverbindlich nach Verfügbarkeit an.</p>
					<hr />
				</div>
				
					<!-- <div id="NameLabel">
						<label>
							Name
							<span class="required">*</span>
						</label>
					</div> -->
					<div class="row">
						<div class="col-md-6">
							$FirstName.FieldHolder
						</div>
						<div class="col-md-6">
							$LastName.FieldHolder
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							$Email.FieldHolder
						</div>				
						<div class="col-md-6">
						</div>				
					</div>
					<div class="row">
						<div class="col-md-6">
							$ArrivalDate.FieldHolder
						</div>				
						<div class="col-md-6">
							$DepartureDate.FieldHolder
						</div>				
					</div>
					<div class="row">
						<div class="col-md-6">
							$Flexibility.FieldHolder
						</div>				
						<div class="col-md-6">
							$ApartmentTypeID.FieldHolder
						</div>				
					</div>
					<div class="row">
						<div class="col-md-6">
							$NumAdults.FieldHolder
						</div>				
						<div class="col-md-6">
							$NumChildren.FieldHolder
						</div>				
					</div>

					<div class="row">
						<div class="col-md-12">
							$Questions.FieldHolder
						</div>				
					</div>


				<% end_with %>



		
				$Fields.dataFieldByName(SecurityID)
			</fieldset>
	
			<% if Actions %>
				<div class="Actions">
					<% loop Actions %>$Field<% end_loop %>
				</div>
			<% end_if %>

		</form>

	</div>
</div>