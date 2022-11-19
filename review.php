

<div id="feedback-form-wrapper">
    <div id="floating-icon">
        <button type="button" class="btn btn-primary btn-sm rounded-0" data-toggle="modal" data-target="#exampleModal">
            Feedback
        </button>

    </div>
    <div id="feedback-form-modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Feedback Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="$_POST">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">How likely would you recommand this tour to your friends?</label>
                                <div class="rating-input-wrapper d-flex justify-content-between mt-2">
                                    <label><input type="radio" name="rating" required/><span class="border rounded px-3 py-2">1</span></label>
                                    <label><input type="radio" name="rating" required/><span class="border rounded px-3 py-2">2</span></label>
                                    <label><input type="radio" name="rating" required/><span class="border rounded px-3 py-2">3</span></label>
                                    <label><input type="radio" name="rating" required/><span class="border rounded px-3 py-2">4</span></label>
                                    <label><input type="radio" name="rating" required/><span class="border rounded px-3 py-2">5</span></label>
                                </div>
                                <div class="rating-labels d-flex justify-content-between mt-1">
                                    <label>Very unlikely</label>
                                    <label>Very likely</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="input-one" placeholder="name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="input-one" placeholder="email" required>
                            </div>
                            <div class="form-group">
                                <label for="input-two">Would you like to share your experience?</label>
                                <textarea class="form-control" id="input-two" rows="3"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>